<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all(); 
        return response()->json($positions); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $position = Position::create($request->all());
        return response()->json($position, 201); 
    }
    public function destroy(Position $position)
    {
        $position->delete();
        return response()->json(null, 204);
    }

}
