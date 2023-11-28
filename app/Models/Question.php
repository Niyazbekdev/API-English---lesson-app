<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperQuestion
 */
class Question extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'question_type_id', 'help', 'questionable_id', 'questionable_type'];

    public array $translatable = ['title', 'help'];

    public function answers():HasMany
    {
        return $this->hasMany(Answer::class)->orderBy('position', 'asc');
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function questionType(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }

}
