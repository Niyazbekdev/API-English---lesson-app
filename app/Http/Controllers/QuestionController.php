<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Services\admin\question\CreateQuestion;
use App\Services\admin\question\DeleteQuestion;
use App\Services\admin\question\IndexQuestion;
use App\Services\admin\question\ShowQuestion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    public function index()
    {
        try {
            $question = app(IndexQuestion::class)->execute([]);
            return QuestionResource::collection($question);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function store(Request $request): QuestionResource
    {
        try {
            $question = app(CreateQuestion::class)->execute($request->all());
            return new QuestionResource($question);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }

    public function show( string $question)
    {
        try {
            $arr = app(ShowQuestion::class)->execute([
                'id' => $question
            ]);
            return new QuestionResource($arr);
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
