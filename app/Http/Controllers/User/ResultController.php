<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResultResource;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Services\Result\AskAnswers;
use App\Services\Result\StartLesson;
use App\Services\Result\StartQuiz;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class ResultController extends Controller
{
    use JsonRespondController;

    public function index(): AnonymousResourceCollection
    {
        return ResultResource::collection(Result::get());
    }

}
