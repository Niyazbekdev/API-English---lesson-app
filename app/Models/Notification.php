<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperNotification
 */
class Notification extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description'];

    public array $translatable = ['title', 'description'];

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('title', 'like', "%{$search}%")
            ->OrWhere('description', 'like', "%{$search}%");
    }
}
