<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\LessonQuestionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionOptionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('admins/users', function (Request $request){
   return $request->user();
});

Route::post('admins/admins',[UserController::class, 'store']);
Route::post('users/signUp', [AuthController::class, 'register']);
Route::post('getCode', [AuthController::class, 'verifyCode']);
Route::post('signIn', [AuthController::class, 'login']);
Route::post('admins/logOut', [UserController::class, 'logOut']);

Route::middleware(['auth:sanctum'])->prefix('admins')->group(function (){
    Route::get('allusers',[UserController::class, 'allUsers']);
    Route::apiResources([
        'quizzes' => QuizController::class,
        'quizzes.questions' => QuizQuestionController::class,
        'questions' => QuestionController::class,
        'moduls' => ModulController::class,
        'lessons.questions' => LessonQuestionController::class,
        'result' => ResultController::class,
        'images' => ImageController::class,
        'audios' => AudioController::class,
        'notifications' => NotificationController::class,
    ]);

    Route::apiResource('moduls.lessons', LessonController::class)->shallow();
    Route::apiResource('lessons.contents', ContentController::class)->shallow();
    Route::apiResource('questions.answers', AnswerController::class)->shallow();
    Route::patch('answers-position',[OptionController::class, 'update']);
});
Route::middleware(['auth:sanctum'])->prefix('users')->group(function (){
    Route::apiResource('quizzes/',QuizController::class);

});
