<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Services\modul\CreateModul;
use App\Services\modul\DeleteModul;
use App\Services\modul\UpdateModul;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ModulController extends Controller
{
    use JsonRespondController;

    public function index(): Collection
    {
        return  Modul::all(['id', 'title', 'created_at', 'updated_at']);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(CreateModul::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update(Request $request, string $modul): JsonResponse
    {
        try {
            app(UpdateModul::class)->execute([
                'id' => $modul,
                'title' => $request->title,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
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
        }
    }
}
