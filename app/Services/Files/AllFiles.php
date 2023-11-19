<?php

namespace App\Services\Files;

use App\Models\Image;
use App\Services\BaseServices;

class AllFiles extends BaseServices
{

    public function execute(): bool
    {
        Image::all();
        return true;
    }
}
