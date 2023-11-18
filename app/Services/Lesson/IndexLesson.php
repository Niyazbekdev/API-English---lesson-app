<?php

namespace App\Services\Lesson;

use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Collection;

class IndexLesson extends BaseServices
{

    public function execute(Modul $modul): Collection
    {
        return $modul->lessons()->get();
    }
}
