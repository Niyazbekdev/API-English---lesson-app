<?php

namespace App\Services\Answer;


use App\Models\Answer;
use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateAnswer extends BaseServices
{
    public function rules(): array
    {
        return [
            'question_type_id' => 'required|exists:questions,question_type_id',
            'answer' => 'required',
            'drag_text' => 'nullable',
            'is_correct' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute($data, Question $question)
    {
        $this->validate($data);
        Answer::create([
           'question_id' =>  $question['id'],
            'answer' => $data['answer'],
            'drag_text' => $data['drag_text'],
            'is_correct' => $data['is_correct'],
        ]);
    }
}
