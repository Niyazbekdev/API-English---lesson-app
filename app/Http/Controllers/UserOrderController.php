<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Services\Order\BuyPremium;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    use JsonRespondController;

    public function store(Rate $rate)
    {
        app(BuyPremium::class)->execute($rate);
        return $this->respondSuccess();
    }
}
