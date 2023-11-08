<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::apiResource('questions', QuestionController::class);
Route::apiResource('users', UserController::class);
