<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Services\admin\question\CreateQuestion;
use App\Services\admin\question\DeleteQuestion;
use App\Services\admin\question\IndexQuestion;
use App\Services\admin\question\ShowQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    use JsonRespondController;
    public function index(Request $request): JsonResponse|QuestionCollection
    {
        try {
            $question = app(IndexQuestion::class)->execute($request->data);
            return new QuestionCollection($question);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(CreateQuestion::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function show( string $question)
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
