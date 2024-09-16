<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('user', UserController::class);
Route::patch('/users/{id}/has_voted', [UserController::class, 'updateHasVoted']);

Route::apiResource('admin', AdminController::class);

Route::apiResource('position', PositionController::class);

Route::apiResource('candidate', CandidateController::class);
Route::patch('/candidates/{id}/increment-votes', [CandidateController::class, 'incrementVotes']);


Route::apiResource('voted', VoteController::class);