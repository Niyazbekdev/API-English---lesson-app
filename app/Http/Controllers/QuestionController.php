<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Services\admin\DeleteQuestion;
use App\Services\admin\ShowQuestion;
use App\Services\user\IndexQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    use JsonRespondController;
    public function index(Request $request)
    {
        try {
            $questions = app(IndexQuestion::class)->execute($request->all());
            return QuestionCollection::collection($questions);
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
