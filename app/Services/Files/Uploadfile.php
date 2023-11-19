<?php

namespace App\Services\Files;

use App\Models\Image;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class Uploadfile extends BaseServices
{
    public function rules(): array
    {
        return [
            'images' => 'required|array',
            'images.*' => 'file|mimes:jpg,bmp,png|max:2048'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        foreach($data['images'] as $image){
            $name = "image-" . $image->hashName();

            $path = $image->store('images', 'public');

            Image::create([
                'image' => $name,
                'path' => $path,
            ]);
        }

        return true;
    }
}
