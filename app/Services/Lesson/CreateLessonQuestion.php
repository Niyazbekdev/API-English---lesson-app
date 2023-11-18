<?php

namespace App\Services\Lesson;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateLessonQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'title' => "required",
            'help' => "nullable",
            'question_type_id' => 'required|exists:question_types,id',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Lesson $lesson): bool
    {
        $this->validate($data);
        $lesson->questions()->create([
            'title' => $data['title'],
            'question_type_id' => $data['question_type_id'],
            'help' => $data['help'],
        ]);
        return true;
    }
}
