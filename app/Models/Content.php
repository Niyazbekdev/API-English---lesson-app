<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperContent
 */
class Content extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];

    public function lesson():BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('title', 'like', "%{$search}%")
            ->OrWhere('description', 'like', "%{$search}%");
    }
}
