<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperResult
 */
class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'resultable_id',
        'resultable_type',
        'started_at',
        'complated_at',
        'questions_count',
        'correct_questions_count',
        'incorrect_questions_count',
        'user_id',
    ];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)->withPivot(['answers', 'is_answered', 'is_correct']);
    }

    public function historyQuestions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)
            ->wherePivot('is_answered', 1)
            ->withPivot(['answers', 'drags', 'answer_text','is_answered', 'is_correct']);
    }
}
