<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with(['student', 'position'])->get();
        return response()->json($candidates);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|string|exists:users,student_id',
            'position_id' => 'required|exists:positions,id',
        ]);

        $candidate = Candidate::create($request->all());

        return response()->json($candidate, 201);
    }
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }
        $candidate->delete();
        return response()->json(null, 204);
    }
    
}
