<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Rate;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BuyPremium extends BaseServices
{

    /**
     * @throws ModelNotFoundException
     */

    public function execute(Rate $rate)
    {
        $user_id = auth()->id();

        $order = Order::where('user_id', $user_id)->first();
        if($order){
            if($order->paid == 1){
                return response()->json([
                    'message' => 'siz aldin tolem qilgansiz'
                ]);
            }
            $order->update([
                'user_id' => $user_id,
                'payment_id' => 1,
                'paid' => false,
            ]);
        }
        else{
            $rate->orders()->create([
                'user_id' => $user_id,
                'payment_id' => 1,
                'paid' => false,
            ]);
        }
        return true;
    }
}
