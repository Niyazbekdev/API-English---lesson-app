<?php

namespace App\Services\user;

use App\Models\Lesson;
use App\Models\Question;
use App\Services\BaseServices;
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
     */
    public function execute(array $data)
    {
        $this->validate($data);
        return Lesson::find($data['id']);
    }
}
