<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return Order::paginate();
    }


}
