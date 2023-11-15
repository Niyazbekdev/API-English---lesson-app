<?php

namespace App\Services\user;

use App\Models\Lesson;
use App\Services\BaseServices;

class IndexLesson extends BaseServices
{

    public function execute($data)
    {
        return Lesson::all();
    }
}
