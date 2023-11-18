<?php

namespace App\Services\Answer;

use App\Models\Answer;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateAnswer extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:answers,id',
            'answer' => 'required',
            'drag_text' => 'nullable',
            'is_correct' => 'nullable',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);
        $answer = Answer::findOrFail($data['id']);
        $answer->update([
            'answer' => $data['answer'],
            'drag_text' => $data['drag_text'],
            'is_correct' => $data['is_correct'],
        ]);
        return true;
    }
}
