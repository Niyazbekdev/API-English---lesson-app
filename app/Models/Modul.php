<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Modul extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ["title"];

    public array $translatable = ["title"];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
