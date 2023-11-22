<?php

namespace App\Services\Lesson;

use App\Models\Lesson;
use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateLesson extends BaseServices
{
    public function rules(): array
    {
        return [
            'modul_id' => 'required,exists:moduls,id',
            'type_lesson_id' => 'required',
            'title' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Modul $modul): bool
    {
        $this->validate($data);

        $modul->lessons()->create([
            'modul_id' => $modul['id'],
            'title' => $data['title'],
            'type_lesson_id' => $data['type_lesson_id']
        ]);

        return true;
    }
}
