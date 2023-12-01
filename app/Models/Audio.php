<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAudio
 */
class Audio extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function url(): string
    {
        return config('app.url') .'/storage/audios/'. $this->image;
    }

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('name', 'like', "%{$search}%");
    }
}
