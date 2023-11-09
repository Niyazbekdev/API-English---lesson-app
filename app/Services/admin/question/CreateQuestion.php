<?php

namespace App\Services\admin\question;

use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'questions.' => "nullable|array",
            'questionable_id' => "required",
            'questionable_type' => "required",
            'questions.*.question' => "required_unless:questions,null",
            'questions.*.answers' => "nullable|array",
            'questions.*.answers.*.answer' => "required_unless:questions,null",
            'questions.*answers.*.is_correct' => "required_unless:questions,null|boolean"
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        foreach ($data['questions'] as $question) {
            $answers = collect($question['answers']);
            $question = Question::create([
                'question' => $question['question'],
                'questionable_id' => $data['questionable_id'],
                'questionable_type' => $data['questionable_type']
            ]);
            foreach ($answers as $answer){
                $this->answers[] = [
                    'question_id' => $question->id,
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct'],
                ];
            }
            DB::table('answers')->insert($this->answers);
            $this->answers = [];
        }
        return true;
    }
}
