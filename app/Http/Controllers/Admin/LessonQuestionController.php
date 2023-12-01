<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Lesson;
use App\Services\Lesson\CreateLessonQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class LessonQuestionController extends Controller
{
    use JsonRespondController;

    public function index(Request $request, Lesson $lesson): AnonymousResourceCollection
    {
        $question = $lesson->questions()->when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return QuestionResource::collection($question);
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
