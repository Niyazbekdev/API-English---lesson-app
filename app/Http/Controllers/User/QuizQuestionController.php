<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Quiz;
use App\Services\Quiz\IndexQuizQuestion;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class QuizQuestionController extends Controller
{
    use JsonRespondController;

    public function index(Quiz $quiz): AnonymousResourceCollection
    {
        return QuestionResource::collection($quiz->questions()->get());
    }
}
