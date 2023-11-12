<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ModulController extends Controller
{
    public function index()
    {
        return Modul::all();
    }
}
