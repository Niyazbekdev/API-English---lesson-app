<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;


Route::apiResource('users', UserController::class);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResource('questions', QuestionController::class);
    Route::apiResource('answers', AnswerController::class);
});
