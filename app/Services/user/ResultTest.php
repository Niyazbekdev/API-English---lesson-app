<?php

namespace App\Services\user;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class ResultTest extends BaseServices
{
    public function rules(): array
    {
        return [
            'question_id' => 'exists:questions,id',
            'answer_id' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $answer = Answer::find($data['answer_id']);
        Result::create([

        ]);
    }
}
