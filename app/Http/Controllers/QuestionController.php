<?php

namespace App\Http\Controllers;

use App\Services\Question\DeleteQuestion;
use App\Services\Question\UpdateQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    use JsonRespondController;

    public function update(Request $request, string $question): JsonResponse
    {
        try {
            app(UpdateQuestion::class)->execute([
                'id' => $question,
                'question_type_id' => $request->question_type_id,
                'title' => $request->title,
                'help' => $request->help,
            ]);
            return $this->respondSuccess();
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
