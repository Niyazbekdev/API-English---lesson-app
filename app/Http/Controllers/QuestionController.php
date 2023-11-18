<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Services\Question\DeleteQuestion;
use App\Services\Question\IndexQuestion;
use App\Services\Question\ShowQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    use JsonRespondController;
    public function index(Request $request)
    {
        try {
            return  app(IndexQuestion::class)->execute($request->all());

        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function show(string $question)
    {
        try {
            $questions = app(ShowQuestion::class)->execute([
                'id' => $question,
            ]);
            return new QuestionResource($questions);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
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
