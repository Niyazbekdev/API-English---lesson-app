<?php

namespace App\Models;

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

}
