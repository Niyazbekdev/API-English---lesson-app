<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Lesson;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class LessonQuestionController extends Controller
{
    use  JsonRespondController;

    public function index(Lesson $lesson): AnonymousResourceCollection
    {
        return QuestionResource::collection($lesson->questions()->get());
    }
}
