<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('users', UserController::class);
Route::post('signIn', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResources([
        'moduls' => ModulController::class,
        'answers' => AnswerController::class,
        ''
    ]);
    Route::post('getCode', [AuthController::class, 'verifyCode']);
});
