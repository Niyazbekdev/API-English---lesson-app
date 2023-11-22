<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function index(): Collection
    {
        return Order::all(['user_id', 'phone', 'tarif', 'month', 'payment', 'price', 'paid', 'created_at', 'updated_at']);
    }
}
