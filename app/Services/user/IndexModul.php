<?php

namespace App\Services\user;

use App\Models\Modul;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Collection;

class IndexModul extends BaseServices
{

    public function execute(): Collection
    {
        return Modul::all();
    }
}
