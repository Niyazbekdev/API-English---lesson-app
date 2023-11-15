<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Models\Quiz;
use App\Services\user\IndexQuestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuizQuestionController extends Controller
{
    public function index(Quiz $quiz): JsonResponse|QuestionCollection
    {
        try {
            $question = app(IndexQuestion::class)->execute([], $quiz);
            return new QuestionCollection($question);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

}
