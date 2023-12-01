<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Services\modul\CreateModul;
use App\Services\modul\DeleteModul;
use App\Services\modul\UpdateModul;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class ModulController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): JsonResponse|AnonymousResourceCollection
    {
        $modul = Modul::when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return ModulResource::collection($modul);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(CreateModul::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }

    public function update(Request $request, string $modul): JsonResponse
    {
        try {
            app(UpdateModul::class)->execute([
                'id' => $modul,
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

    public function destroy( string $modul): JsonResponse
    {
        try {
            app(DeleteModul::class)->execute([
                'id' => $modul,
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
