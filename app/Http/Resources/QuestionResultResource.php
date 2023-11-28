<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResultResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->getTranslations('title'),
            'answers' => json_decode($this->pivot->answers),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
