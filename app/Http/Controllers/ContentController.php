<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Services\Content\CreateContent;
use App\Services\Content\DeleteContent;
use App\Services\Content\UpdateContent;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContentController extends Controller
{
    use JsonRespondController;

    public function index(Lesson $lesson): Collection
    {
        return $lesson->contents()->get();
    }

    public function store(Request $request, Lesson $lesson): JsonResponse
    {
        try {
            app(CreateContent::class)->execute($request->all(),$lesson);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update(Request $request, string $content): JsonResponse
    {
        try {
            app(UpdateContent::class)->execute([
                'id' => $content,
                'title' => $request->title,
                'description' => $request->description,
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

    public function destroy(string $content): JsonResponse
    {
        try {
            app(DeleteContent::class)->execute([
                'id' => $content,
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
