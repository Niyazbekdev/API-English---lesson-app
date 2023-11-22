<?php

namespace App\Services\Question;


use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class UpdateQuestion extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:questions,id',
            'title' => 'required',
            'help' => 'nullable'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute($data): bool
    {
        $this->validate($data);

        $question = Question::findOrFail($data['id']);

        $question->update([
            'title' => $data['title'],
            'help' => $data['help']
        ]);

        return true;
    }
}
