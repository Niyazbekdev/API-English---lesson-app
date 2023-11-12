<?php

use App\Http\Controllers\ModulController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('users', UserController::class);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResources([
        'quizzes.questions' => QuizController::class,
        'moduls' => ModulController::class,
    ]);
});
