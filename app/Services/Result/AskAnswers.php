<?php

namespace App\Services\Result;

use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class AskAnswers extends BaseServices
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'question_id' => 'required|exists:questions,id',
            'answers' => 'array',
            'answers.*.' => 'required'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */

    public function execute(array $data): bool
    {
        $this->validate($data);



        return true;
    }
}
