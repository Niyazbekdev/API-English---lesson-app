<?php

namespace App\Http\Controllers;

use App\Http\Resources\AudioResource;
use App\Models\Audio;
use App\Services\Files\DeleteAudio;
use App\Services\Files\UploadAudio;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class AudioController extends Controller
{
    use JsonRespondController;

    public function index(): AnonymousResourceCollection
    {
        return AudioResource::collection(Audio::all(['id', 'name', 'path', 'created_at', 'updated_at']));
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(UploadAudio::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $audio): JsonResponse
    {
        try {
            app(DeleteAudio::class)->execute([
                'id' => $audio,
            ]);

            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
