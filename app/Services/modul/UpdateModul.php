<?php

namespace App\Services\modul;

use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateModul extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:moduls,id',
            'title' => 'required',
            'description' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);

        $modul = Modul::findOrFail($data['id']);

        $modul->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }
}
