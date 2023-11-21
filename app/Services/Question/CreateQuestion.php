<?php

namespace App\Services\Question;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'question_type_id' => 'required|exists:question_types,id',
            'title' => "required",
            'help' => "required",
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Quiz $quiz): bool
    {
        $this->validate($data);

        $quiz->questions()->create([
            'question_type_id' => $data['question_type_id'],
            'title' => $data['title'],
            'help' => $data['help']
        ]);

        return true;
    }
}
