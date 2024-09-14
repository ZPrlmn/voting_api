<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string|unique:admins,username',
                'password' => 'required|string|min:8', 
            ]);
            Admin::create([
                'username' => $validatedData['username'],
                'password' => $validatedData['password'], 
            ]);

            return response()->json(['message' => 'Admin created successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        try {
            $admins = Admin::all(); // Fetch all admins from the database
            return response()->json($admins, 200); // Return the admins as a JSON response
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }
}
