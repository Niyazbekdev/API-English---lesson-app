<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class QuestionResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answers' => AnswerResource::collection($this->answers),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
