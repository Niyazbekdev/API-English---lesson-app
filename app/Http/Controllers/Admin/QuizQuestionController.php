<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Quiz;
use App\Services\Quiz\CreateQuizQuestion;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuizQuestionController extends Controller
{
    use JsonRespondController;

    public function index(Request $request, Quiz $quiz): LengthAwarePaginator|JsonResponse
    {
        try {
            return $quiz->questions()->paginate($request->limit) ?? $quiz->questions()->paginate();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }

    public function store(QuestionRequest $request, Quiz $quiz): JsonResponse
    {
        try {
           app(CreateQuizQuestion::class)->execute($request->all(), $quiz);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }

}
