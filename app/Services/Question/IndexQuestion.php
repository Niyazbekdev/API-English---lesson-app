<?php

namespace App\Services\Question;

use App\Models\Question;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Collection;

class IndexQuestion extends BaseServices
{

    public function execute($data): Collection
    {
       return Question::all(['id', 'title' , 'questionable_id', 'questionable_type', 'question_type_id', 'help', 'created_at', 'updated_at']);
    }

}
