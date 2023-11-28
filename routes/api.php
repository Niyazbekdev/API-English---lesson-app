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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('admins/admins',[UserController::class, 'login']);
Route::post('admins/logOut', [UserController::class, 'logOut']);

Route::middleware(['auth:sanctum'])->prefix('admins')->group(function (){

    Route::get('users', function (Request $request){
        return $request->user();
    });

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
        'rates' => RateController::class,
    ]);

    Route::apiResource('moduls.lessons', LessonController::class)->shallow();
    Route::apiResource('lessons.contents', ContentController::class)->shallow();
    Route::apiResource('questions.answers', AnswerController::class)->shallow();
    Route::patch('answers-position',[OptionController::class, 'update']);
    Route::get('orders',[OrderController::class, 'index']);
});

Route::post('users/signUp', [AuthController::class, 'register']);
Route::post('users/signIn', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->prefix('users')->group(function (){
    Route::apiResources([
        'quizzes' => QuizController::class,
        'quizzes.questions' => QuizQuestionController::class,
        'moduls' => ModulController::class,
        'moduls.lessons' => LessonController::class,
       // 'results.questions' => ResultController::class,
        //'quizzes.results' => QuizResultController::class,
        'notifications' => UserNotificationController::class,
        'lessons.questions' => LessonQuestionController::class,
        'lessons' => LessonController::class,
        'lessons.contents' => ContentController::class,
        'payments' => PaymentController::class,
    ]);
    Route::post('results/{result}/questions/{question}', [ResultController::class, 'store']);
    Route::post('results/{result}/answers', [ResultController::class, 'store']);
    Route::post('quizzes/{quiz}/results', [ResultController::class, 'startQuiz']);
    Route::post('lessons/{lesson}/results', [ResultController::class, 'startLesson']);
    Route::get('results', [ResultController::class, 'statistic']);
});
