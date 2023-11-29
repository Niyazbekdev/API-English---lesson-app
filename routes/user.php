<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\LessonContentController;
use App\Http\Controllers\User\LessonQuestionController;
use App\Http\Controllers\User\LessonResultController;
use App\Http\Controllers\User\ModulController;
use App\Http\Controllers\User\ModulLessonController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\QuizQuestionController;
use App\Http\Controllers\User\QuizResultController;
use App\Http\Controllers\User\RateController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\ResultQuestionController;

Route::post('users/signUp', [AuthController::class, 'register']);
Route::post('users/signIn', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->prefix('users')->group(function (){
    Route::get('getMe', function (Request $request){
        return $request->user();
    });

    Route::post('profiles', [AuthController::class, 'profile']);
    Route::post('logOut', [AuthController::class, 'logOut']);

    Route::apiResource('quizzes', QuizController::class);
    Route::apiResource('quizzes.questions', QuizQuestionController::class)->shallow();
    Route::apiResource('moduls', ModulController::class);
    Route::apiResource('moduls.lessons', ModulLessonController::class)->shallow();
    Route::apiResource('lessons.questions', LessonQuestionController::class);
    Route::apiResource('lessons.contents', LessonContentController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('rates', RateController::class);
    Route::apiResource('resulsts', ResultController::class);
    Route::apiResource('quizzes.results', QuizResultController::class);
    Route::apiResource('lessons.results', LessonResultController::class);
    Route::apiResource('results.questions', ResultQuestionController::class);

});
