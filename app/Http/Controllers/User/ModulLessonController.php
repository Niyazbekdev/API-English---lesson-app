<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Services\Lesson\IndexLesson;
use App\Services\Lesson\ShowLesson;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class ModulLessonController extends Controller
{
    use JsonRespondController;

    public function index(Modul $modul): AnonymousResourceCollection
    {
       return LessonResource::collection($modul->lessons()->get());
    }

    public function show(string $lesson): LessonResource|JsonResponse
    {
        try {
            $return = app(ShowLesson::class)->execute([
                'id' => $lesson,
            ]);
            return new LessonResource($return);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
