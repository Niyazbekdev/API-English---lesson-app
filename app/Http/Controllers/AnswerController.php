<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Services\Answer\CreateAnswer;
use App\Services\Answer\DeleteAnswer;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AnswerController extends Controller
{
    use JsonRespondController;

    public function index(Question $question){
        return $question->answers()->get();
    }

    public function store(Request $request, Question $question): JsonResponse
    {
        try {
            app(CreateAnswer::class)->execute($request->all(),$question);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $answer, Question $question): JsonResponse
    {
        try {
            app(DeleteAnswer::class)->execute([
                'id' => $answer
            ], $question);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }
}
