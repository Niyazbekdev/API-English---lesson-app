<?php

namespace App\Services\admin\question;

use App\Models\Question;
use App\Services\BaseServices;
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
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $question = Question::where('id', $data['id'])->first();
        $question->delete();
        return true;
    }
}
