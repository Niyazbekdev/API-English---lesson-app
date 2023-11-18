<?php

namespace App\Services\Quiz;


use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateQuiz extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:quizzes,id',
            'title' => 'required',
            'description' => 'required'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $quiz = Quiz::findOrFail($data['id']);
        $quiz->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
        return true;
    }
}
