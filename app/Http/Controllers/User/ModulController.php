<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Services\modul\IndexModul;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class ModulController extends Controller
{
    use JsonRespondController;
    public function index(): AnonymousResourceCollection
    {
        return ModulResource::collection(Modul::get());
    }
}
