<?php

namespace App\Services\admin;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateLesson extends BaseServices
{
    public function rules(): array
    {
        return [
            'modul_id' => 'required',
            'title' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        Lesson::create([
            'modul_id' => $data['modul_id'],
            'title' => $data['title'],
            'type_id' => 1
        ]);
        return true;
    }
}
