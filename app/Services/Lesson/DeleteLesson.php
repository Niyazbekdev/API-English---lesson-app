<?php

namespace App\Services\Lesson;

use App\Models\Lesson;
use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteLesson extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:lessons,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $lesson = Lesson::findOrFail($data['id']);
        $lesson->delete();
        return true;
    }
}
