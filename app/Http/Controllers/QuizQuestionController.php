<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionCollection;
use App\Models\Quiz;
use App\Services\Quiz\QuizQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class QuizQuestionController extends Controller
{
    use JsonRespondController;

    public function __construct(
        protected QuizQuestion $quizQuestion
    )
    {
    }

    public function index(Quiz $quiz): QuestionCollection
    {
       $questions = $this->quizQuestion->getQuestion($quiz);
       return new QuestionCollection($questions);
    }

    public function store(QuestionRequest $request, Quiz $quiz): JsonResponse
    {
        try {
            $this->quizQuestion->add($request->all(), $quiz);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
