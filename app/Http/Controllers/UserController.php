<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    use HasApiTokens;


    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        return response()->json($user);
    }

    public function store(Request $request)
    {   
        try{                
            $validatedData = $request->validate([
                'student_id' => 'required|string|unique:users,student_id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'year' => 'required|integer',
                'course' => 'required|string|max:255',
                'department' => 'required|string|max:255',
            ]);

            User::create([
                'student_id' => $validatedData['student_id'],
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'year' => $validatedData['year'],
                'course' => $validatedData['course'],
                'department' => $validatedData['department'],
                'has_voted' => false,  // Default value
            ]);
            return response()->json(['message' => 'User created successfully.']);
        } catch (\Exception $e) {
            // Return a generic error message for any other exceptions
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
