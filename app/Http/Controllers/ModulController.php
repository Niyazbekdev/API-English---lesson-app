<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Services\user\IndexModul;
use App\Traits\JsonRespondController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ModulController extends Controller
{
    use JsonRespondController;
    public function index(): AnonymousResourceCollection
    {
        $module = Modul::with('lessons')->get();
        return ModulResource::collection($module);
    }
}
