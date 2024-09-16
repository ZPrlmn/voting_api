<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    public function index()
    {
        $votes = Vote::with(['student', 'candidate'])->get(); // Eager load relations
        return response()->json($votes);
    }
    
    public function store(Request $request)
    {
        // Validate that 'votes' is an array with each item containing valid 'student_id' and 'candidates_id'
        $request->validate([
            'votes' => 'required|array',
            'votes.*.student_id' => 'required|exists:users,student_id',
            'votes.*.candidates_id' => 'required|exists:candidates,id',
        ]);

        // Get the array of votes
        $votes = $request->input('votes');

        // Use a transaction to ensure all votes are created successfully
        DB::beginTransaction();

        try {
            // Insert all votes in bulk
            Vote::insert(array_map(function ($vote) {
                return [
                    'student_id' => $vote['student_id'],
                    'candidates_id' => $vote['candidates_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $votes));

            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json(['message' => 'Votes stored successfully'], 201);

        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();

            // Return a meaningful error response
            return response()->json([
                'error' => 'Failed to store votes',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
