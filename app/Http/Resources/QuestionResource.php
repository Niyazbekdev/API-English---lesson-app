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
            'title' => $this->getTranslations('title'),
            'help' => $this->getTranslations('help'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
