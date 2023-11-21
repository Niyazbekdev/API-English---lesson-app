<?php

namespace App\Services\Files;

use App\Models\Audio;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DeleteAudio extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:audio,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $audio = Audio::findOrFail($data['id']);

        Storage::disk('public')->delete('audios/' . $audio['name']);

        $audio->delete();

        return true;
    }
}
