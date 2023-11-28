<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'questons_count' => $this->questions_count,
            'correct_questions_count' => $this->correct_question_count,
            'incorrect_questions_count' => $this->incorrect_questions_count,
            'questions' => QuestionResultResource::collection($this->historyQuestions)
        ];
    }
}
