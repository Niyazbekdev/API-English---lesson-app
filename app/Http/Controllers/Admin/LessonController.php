<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Modul;
use App\Services\Lesson\CreateLesson;
use App\Services\Lesson\DeleteLesson;
use App\Services\Lesson\ShowLesson;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class LessonController extends Controller
{
    use JsonRespondController;

    public function index(Request $request, Modul $modul): AnonymousResourceCollection
    {
        $lesson = $modul->lessons()->when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return LessonResource::collection($lesson);
    }

    public function store(Request $request, Modul $modul): JsonResponse
    {
        try {
            app(CreateLesson::class)->execute($request->all(), $modul);
            return $this->respondSuccess();
        }  catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
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

    public function show(string $lesson): LessonResource|JsonResponse
    {
        try {
            $les = app(ShowLesson::class)->execute([
                'id' => $lesson,
            ]);
            return new LessonResource($les);
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
