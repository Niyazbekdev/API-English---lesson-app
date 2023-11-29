<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Services\Result\StartQuiz;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuizResultController extends Controller
{
    use JsonRespondController;

    public function store(Request $request, Quiz $quiz): JsonResponse
    {
        try {
            app(StartQuiz::class)->execute($request->all(), $quiz);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return  $this->respondValidatorFailed($exception->validator);
        }
    }
}
