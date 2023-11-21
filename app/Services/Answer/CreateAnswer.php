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
            'answer' => 'required',
            'drag_text' => 'nullable',
            'is_correct' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute($data, Question $question): bool
    {

        $i = 0;

        $sequence = Answer::where('question_id',$question['id'])->get();
        $arr = [];
        for($j = 0; $j < count($sequence); $j++){
            $arr [] = $sequence;
            $i++;
        }

        $this->validate($data);
        $question->answers()->create([
            'answer' => $data['answer'],
            'position' => $i,
            'drag_text' => $data['drag_text'],
            'is_correct' => $data['is_correct'],
        ]);



        return true;
    }
}
