<?php

namespace App\Services\Question;

use App\Models\Answer;
use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:questions,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $question = Question::findOrFail($data['id']);

        $answers = Answer::where('question_id', $data['id'])->get();

        foreach ($answers as $answer){
            Answer::find($answer['id'])->delete();
        }

        $question->delete();

        return true;
    }
}
