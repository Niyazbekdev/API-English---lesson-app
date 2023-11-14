<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Question extends Model
{
    use HasFactory;

    protected $fillable = ["question", "question_type_id", "help", "questionable_id", "questionable_type"];

    public function answers():HasMany
    {
        return $this->hasMany(Answer::class);
    }
}