<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Services\admin\CreateLesson;
use App\Services\admin\DeleteLesson;
use App\Services\user\IndexLesson;
use App\Services\user\ShowLesson;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function show(string $lesson): LessonResource|JsonResponse
    {
        try {
            $lessons = app(ShowLesson::class)->execute([
                'id' => $lesson
            ]);
            return new LessonResource($lessons);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(CreateLesson::class)->execute($request->all());
            return $this->respondSuccess();
        }  catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $lesson): JsonResponse
    {
        try {
            app(DeleteLesson::class)->execute([
                'id' => $lesson,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }
}
