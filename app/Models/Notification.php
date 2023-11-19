<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Notification extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];
}
