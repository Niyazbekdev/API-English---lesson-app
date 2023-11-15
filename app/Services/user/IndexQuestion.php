<?php

namespace App\Services\user;

use App\Models\Question;
use App\Services\BaseServices;

class IndexQuestion extends BaseServices
{

    public function execute($data)
    {
        return Question::paginate(5);
    }
}
