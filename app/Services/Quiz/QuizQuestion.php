<?php

namespace App\Services\Quiz;

use App\Http\Requests\QuestionRequest;
use App\Models\Quiz;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class QuizQuestion
{
    public function getQuestion(Quiz $quiz): LengthAwarePaginator
    {
        return $quiz->questions()->paginate(10);
    }

    /**
     * @throws ValidationException
     */
    public function add($data, Quiz $quiz): bool
    {
        Validator::make($data, (array) QuestionRequest::class)->validate();

        $quiz->questions()->create([
            'question_type_id' => $data['question_type_id'],
            'title' => $data['title'],
            'help' => $data['help'],
        ]);
        return true;
    }
}
