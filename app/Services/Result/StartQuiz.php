<?php

namespace App\Services\Result;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StartQuiz extends BaseServices
{

    /**
     * @throws ModelNotFoundException
     */

    public function execute(Quiz $quiz): Model
    {
        $questions = $quiz->questions()->select(['id'])->get();

        $array = [];

        foreach ($questions as $question){
            $array[$question['id']] = [
                'is_answered' => false,
                'is_correct' => null,
                'answer_text' => null,
                'drags' => null,
                'answers' => null,
            ];
        }

        $result = $quiz->results()->firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $result->update([
            'started_at' => now(),
            'complated_at' => null,
            'questions_count' => $questions->count(),
            'correct_questions_count' => null,
            'incorrect_questions_count' => null,
        ]);

        $result->questions()->sync($array);
        return $result->load(['questions' =>[
            'questionType',
            'randomAnswers',
            'drags',
        ]]);
    }
}
