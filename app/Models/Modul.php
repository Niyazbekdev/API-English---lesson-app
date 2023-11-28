<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperModul
 */
class Modul extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
