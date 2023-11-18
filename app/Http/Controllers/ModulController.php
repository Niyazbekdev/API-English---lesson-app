<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    use JsonRespondController;
    public function index(): Collection
    {
        return  Modul::all(['id', 'title', 'created_at', 'updated_at']);
    }

    public function store(Request $request)
    {

    }
}
