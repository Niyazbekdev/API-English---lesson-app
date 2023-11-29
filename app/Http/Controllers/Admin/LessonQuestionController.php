<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Lesson;
use App\Services\Lesson\CreateLessonQuestion;
use App\Services\Lesson\IndexLessonQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class LessonQuestionController extends Controller
{
    use JsonRespondController;

    public function index(Request $request, Lesson $lesson): JsonResponse|AnonymousResourceCollection
    {
        try {
            $return = app(IndexLessonQuestion::class)->execute([
                'limit' => $request->limit,
            ], $lesson);
            return QuestionResource::collection($return);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

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
