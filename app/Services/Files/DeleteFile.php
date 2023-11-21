<?php

namespace App\Services\Files;

use App\Models\Image;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DeleteFile extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:images,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $image = Image::findOrFail($data['id']);

        Storage::disk('public')->delete('images/' . $image['image']);

        $image->delete();

        return true;
    }
}
