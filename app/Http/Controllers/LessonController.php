<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Services\user\IndexLesson;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LessonController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): Collection|JsonResponse
    {
        try {
            return app(IndexLesson::class)->execute($request->all());
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
