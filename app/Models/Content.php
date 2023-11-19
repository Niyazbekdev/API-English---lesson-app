<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Content extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];

    public function lesson():BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
