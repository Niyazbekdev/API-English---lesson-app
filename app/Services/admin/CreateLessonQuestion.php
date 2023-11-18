<?php

namespace App\Services\admin;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateLessonQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'question' => "required",
            'answers' => "required|array",
            'answers.*.answer' => "required_unless:answers,null",
            'answers.*.is_correct' => "nullable|boolean",
            'answers.*.drag_text' => "nullable",
            'help' => "required",
            'question_type_id' => 'required|exists:question_types,id',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Lesson $lesson): bool
    {
        $this->validate($data);
        $question = $lesson->questions()->create([
           'question' => $data['question'],
           'question_type_id' => $data['question_type_id'],
           'help' => $data['help'],
        ]);
        if($data['question_type_id'] == 1)
        {
            foreach ($data['answers'] as $answer) {
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }else if($data['question_type_id'] == 2)
        {
            $i = 0;
            foreach ($data['asnwers'] as $answer){
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }else if($data['question_type_id'] == 3)
        {
            $i = 0;
            foreach ($data['asnwers'] as $answer){
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'position' => $i++,
                ]);
            }
        }else if($data['question_type_id'] == 4)
        {
            foreach ($data['answers'] as $answer){
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'drag_text' => $answer['drag_text'],
                ]);
            }
        }else if($data['question_type_id'] == 5)
        {
            foreach ($data['answers'] as $answer){
                $question->answers()->create([
                    'answer' => $answer['answer'],
                ]);
            }
        }
        return true;
    }
}
