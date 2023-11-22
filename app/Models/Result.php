<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'resultable_id',
        'resultable_type',
        'started_at',
        'complated_at',
        'question_count',
        'correct_question_count',
        'incorrect_question_count',
        'user_id',
    ];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)->withPivot(['answers', 'is_answered', 'is_correct']);
    }
}
