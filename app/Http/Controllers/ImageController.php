<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Services\Files\DeleteFile;
use App\Services\Files\Uploadfile;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ImageController extends Controller
{
    use JsonRespondController;
    public function index()
    {
        return ImageResource::collection(Image::all());
    }
    public function store(Request $request): JsonResponse
    {
        try {
            app(Uploadfile::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $image): JsonResponse
    {
        try {
            app(DeleteFile::class)->execute([
                'id' => $image,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
