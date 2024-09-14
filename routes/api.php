<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('user', UserController::class);

Route::apiResource('admin', AdminController::class);

Route::apiResource('position', PositionController::class);

Route::apiResource('candidate', CandidateController::class);