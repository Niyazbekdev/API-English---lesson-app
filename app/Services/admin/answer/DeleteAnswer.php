<?php

namespace App\Services\admin\answer;

use App\Models\Answer;
use App\Services\BaseServices;
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
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $answer = Answer::where('id', $data['id'])->first();
        $answer->delete();
        return true;
    }
}
