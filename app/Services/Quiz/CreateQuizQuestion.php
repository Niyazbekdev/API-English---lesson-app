<?php

namespace App\Services\Quiz;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CreateQuizQuestion extends BaseServices
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
     * @throws ModelNotFoundException
     */

    public function execute(array $data, Quiz $quiz): bool
    {
        $this->validate($data);

        $quiz->questions()->create([
            'title' => $data['title'],
            'help' => $data['help'],
            'question_type_id' => $data['question_type_id'],
        ]);

        return true;
    }
}
