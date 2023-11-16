<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Lesson;
use App\Services\admin\CreateQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LessonQuestionController extends Controller
{
    use JsonRespondController;

    public function store(Lesson $lesson)
    {
        try {
            $questions = app(CreateQuestion::class)->execute([
                'questionable_id' => $lesson,
            ]);
            return new QuestionResource($questions);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
