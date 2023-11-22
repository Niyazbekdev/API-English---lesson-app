<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Services\Lesson\CreateLesson;
use App\Services\Lesson\DeleteLesson;
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

    public function index(Modul $modul): Collection|JsonResponse
    {
        return $modul->lessons()->get();
    }

    public function store(Request $request, Modul $modul): JsonResponse
    {
        try {
            app(CreateLesson::class)->execute($request->all(), $modul);
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
