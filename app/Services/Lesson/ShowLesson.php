<?php

namespace App\Services\Lesson;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ShowLesson extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:lessons,id',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): Lesson
    {
        $this->validate($data);
        return Lesson::findOrFail($data['id']);
    }
}
