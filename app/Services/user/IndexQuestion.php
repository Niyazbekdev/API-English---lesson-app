<?php

namespace App\Services\user;

use App\Models\Question;
use App\Models\Quiz;
use App\Services\BaseServices;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class IndexQuestion extends BaseServices
{

    public function execute($data,Quiz $quiz): LengthAwarePaginator
    {
       return $quiz->questions()->paginate();
    }
}
