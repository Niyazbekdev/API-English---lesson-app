<?php

namespace App\Services\admin;

use App\Models\Answer;
use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'question' => "required",
            'answers' => "nullable|array",
            'answers.*.answer' => "required_unless:answers,null",
            'answers.*.is_correct' => "required_unless:answers,null|boolean",
            'help' => "required"
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Quiz $quiz): bool
    {
        $this->validate($data);
        $quiz->questions()->create([
            'question' => $data['question'],
            'help' => $data['help']
        ]);

        foreach ($data['answers'] as $answer) {
            Answer::create([
                'question_id' => 2,
                'answer' => $answer['answer'],
                'is_correct' => $answer['is_correct'],
            ]);

        }
        return true;
    }
}
