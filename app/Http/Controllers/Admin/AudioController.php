<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AudioResource;
use App\Models\Audio;
use App\Services\Files\DeleteAudio;
use App\Services\Files\UploadAudio;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class AudioController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $audio = Audio::when($request->search ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate($request->limit ?? 10);
        return AudioResource::collection($audio);
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
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHttpStatusCode($exception->getCode());
            return $this->respondError($exception->getMessage());
        }
    }
}
