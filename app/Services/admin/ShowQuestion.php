<?php

namespace App\Services\admin;

use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ShowQuestion extends BaseServices
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
    public function execute(array $data): array
    {
        $this->validate($data);
        $question = Question::findOrFail($data['id']);
        return [$question];
    }
}
