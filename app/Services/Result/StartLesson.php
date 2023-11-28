<?php

namespace App\Services\Result;

use App\Models\Lesson;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StartLesson extends BaseServices
{

    /**
     * @throws ModelNotFoundException
     */

    public function execute(Lesson $lesson): bool
    {
        $lesson->results()->create([
            'user_id' => auth()->id(),
            'started_at' => now(),
            'questions_count' => $lesson->questions()->count(),
        ]);
        return true;
    }
}
