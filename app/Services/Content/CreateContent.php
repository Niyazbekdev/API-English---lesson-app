<?php

namespace App\Services\Content;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CreateContent extends BaseServices
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data, Lesson $lesson): bool
    {
        $this->validate($data);

        $lesson->contents()->create([
            'lesson_id' => $lesson->id,
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }
}
