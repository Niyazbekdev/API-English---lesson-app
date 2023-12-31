<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperImage
 */
class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function url(): string
    {
        return config('app.url') .'/storage/images/'. $this->image;
    }

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('image', 'like', "%{$search}%");
    }
}
