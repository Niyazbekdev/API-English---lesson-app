<?php

namespace App\Services\admin\question;

use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Collection;

class IndexQuestion extends BaseServices
{

    public function execute($data)
    {
        return Question::paginate(2);
    }
}
