<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ["title"];

    public function questions(): MorphMany
    {
        return $this->morphMany(Question::class, 'questionable');
    }
}
