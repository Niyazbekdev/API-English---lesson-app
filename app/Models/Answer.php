<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer',
        'position',
        'drag_text',
        'is_correct'
    ];

    protected $casts = [
        'is_correct',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
