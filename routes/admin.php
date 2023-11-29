<?php


use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AudioController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\LessonQuestionController;
use App\Http\Controllers\Admin\ModulController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\User\ResultController;

Route::post('admins/admins',[UserController::class, 'login']);
Route::post('admins/logOut', [UserController::class, 'logOut']);

Route::middleware(['auth:sanctum'])->prefix('admins')->group(function (){

    Route::get('getMe', function (Request $request){
        return $request->user();
    });
    Route::apiResource('quizzes', QuizController::class);
    Route::apiResource('quizzes.questions', QuizQuestionController::class);
    Route::apiResource('questions', QuestionController::class);
    Route::apiResource('moduls', ModulController::class);
    Route::apiResource('moduls.lessons', LessonController::class)->shallow();
    Route::apiResource('lessons.contents', ContentController::class)->shallow();
    Route::apiResource('lessons.questions', LessonQuestionController::class);
    Route::apiResource('questions.answers', AnswerController::class)->shallow();
    Route::apiResource('results', ResultController::class);
    Route::apiResource('images', ImageController::class);
    Route::apiResource('audios', AudioController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('rates', RateController::class);
    Route::apiResource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::patch('answers-position',[OptionController::class, 'update']);
    Route::get('orders',[OrderController::class, 'index']);
});
