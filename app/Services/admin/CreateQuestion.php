<?php

namespace App\Services\admin;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class CreateQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'question' => "required",
            'questionable_id' => 'required|',
            'answers' => "nullable|array",
            'answers.*.answer' => "required_unless:answers,null",
            'answers.*.is_correct' => "required_unless:answers,null|boolean",
            'answers.*.position' => "required_unless:answers,null",
            'answers.*.drag_text' => "required_unless:answers,null",
            'help' => "required",
            'question_type_id' => 'required|exists:question_types,id',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data, Quiz $quiz): bool
    {
        $this->validate($data);
        $question = $quiz->questions()->create([
            'question' => $data['question'],
            'help' => $data['help']
        ]);

        if($data['question_type_id'] == 1) // simple
        {
            foreach ($data['answers'] as $answer) {
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }else if($data['question_type_id'] == 2) // Multiple choice
        {
            foreach ($data['answers'] as $answer) {
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct'], // birneshe is correct
                ]);
            }
        }else if($data['question_type_id'] == 3) // Sequence
        {
            foreach ($data['answers'] as $answer) {
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'position' => $answer['position'],
                    'is_correct' => $answer['is_correct'], // barligi true boliw kerek yamasa is correct null buliw kerek
                ]);
            }
        }else if($data['question_type_id'] == 4) // Drag and drop
        {
            foreach ($data['answers'] as $answer) {
                $question->answers()->create([
                    'answer' => $answer['answer'],
                    'drag_text' => $answer['drag_text'],
                    'is_correct' => $answer['is_correct'], // barligi true boliw kerek yamasa is correct null buliw kerek
                ]);
            }
        }
        return true;
    }
}
