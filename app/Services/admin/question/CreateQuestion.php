<?php

namespace App\Services\admin\question;

use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'question' => "required",
            'questionable_id' => "required",
            'questionable_type' => "required"
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): Question
    {
        $this->validate($data);
        return Question::create([
            'question' => $data['question'],
            'questionable_id' => $data['questionable_id'],
            'questionable_type' => $data['questionable_type']
        ]);
    }
}
