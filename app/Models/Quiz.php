<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperQuiz
 */
class Quiz extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];

    public function questions(): MorphMany
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function results(): MorphMany
    {
        return $this->morphMany(Result::class, 'resultable');
    }

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('title', 'like', "%{$search}%")
            ->OrWhere('description', 'like', "%{$search}%");
    }
}
