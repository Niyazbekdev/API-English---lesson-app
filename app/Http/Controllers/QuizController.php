<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Models\Quiz;
use App\Services\admin\CreateQuestion;
use App\Services\admin\DeleteQuestion;
use App\Services\admin\ShowQuestion;
use App\Services\user\IndexQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuizController extends Controller
{
    use JsonRespondController;
    public function index(Quiz $quiz): JsonResponse|QuestionCollection
    {
        try {
            $question = app(IndexQuestion::class)->execute([], $quiz);
            return new QuestionCollection($question);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function store(Request $request, Quiz $quiz): JsonResponse
    {
        try {
            app(CreateQuestion::class)->execute($request->all(), $quiz);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function show( string $question, Quiz $quiz)
    {
        try {
            [$questions] = app(ShowQuestion::class)->execute([
                'id' => $question
            ]);
            return new QuestionResource($questions);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function destroy(string $question)
    {
        try {
            app(DeleteQuestion::class)->execute([
                'id' => $question,
            ]);
            return response([
                'Success' => true
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
}
