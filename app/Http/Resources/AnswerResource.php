<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'answer' => $this->answer,
            'is_correct' => $this->is_correct,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
