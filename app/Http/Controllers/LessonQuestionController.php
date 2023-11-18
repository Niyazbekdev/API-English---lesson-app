<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Services\admin\CreateLessonQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LessonQuestionController extends Controller
{
    use JsonRespondController;

    public function store(Request $request, Lesson $lesson): JsonResponse
    {
        try {
            app(CreateLessonQuestion::class)->execute($request->all(), $lesson);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
