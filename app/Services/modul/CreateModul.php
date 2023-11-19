<?php

namespace App\Services\modul;

use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CreateModul extends BaseServices
{
    public function rules(): array
    {
        return [
            'title' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);
        Modul::create([
            'title' => $data['title'],
        ]);
        return true;
    }
}
