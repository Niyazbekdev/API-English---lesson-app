<?php

namespace App\Services\Result;

use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StartQuiz extends BaseServices
{

    /**
     * @throws ModelNotFoundException
     */

    public function execute(Quiz $quiz): bool
    {

        $quiz->results()->create([
            'user_id' => auth()->id(),
            'started_at' => now(),
            'complated_at' => null,
            'questions_count' => 11,
        ]);
        return true;
    }
}
