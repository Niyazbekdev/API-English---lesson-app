<?php

namespace App\Services\Answer;

use App\Models\Answer;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DeleteAnswer extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:answers,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $answer = Answer::where('id', $data['id'])->first();

        $answer->delete();

        return true;
    }
}
