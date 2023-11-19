<?php

namespace App\Services\Files;

use App\Models\Audio;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UploadAudio extends BaseServices
{
    public function rules(): array
    {
        return [
            'name' => 'array',
            'name.*.' => 'file|mimes:mpeg,mpga,mp3,wav|max:4048'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        foreach ($data['name'] as $item){
            $name = "Audio-" . $item->hashName();

            $path = $item->store('audios', 'public');

            Audio::create([
                'name' => $name,
                'path' => $path,
            ]);
        }

        return true;
    }
}
