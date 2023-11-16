<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\LessonQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('admins', UserController::class);
Route::post('signUp', [AuthController::class, 'register']);
Route::post('signIn', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResources([
        'moduls' => ModulController::class,
        'answers' => AnswerController::class,
        'lessons.questions' => LessonQuestionController::class,
        'quizzes' => QuizController::class,
        'quizzes.questions' => QuizQuestionController::class,
        'questions' => QuestionController::class,
        'lessons' => LessonController::class,
        'result' => ResultController::class,
    ]);
});
