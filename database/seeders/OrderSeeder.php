<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{

    public function run(): void
    {
        Order::create([
            'user_id' => 2,
            'rate_id' => 1,
            'payment_id' => 2,
            'paid' => false,
        ]);
    }
}
