<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeLesson extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

}
