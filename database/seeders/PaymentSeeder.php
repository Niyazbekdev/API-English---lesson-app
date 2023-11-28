<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{

    public function run(): void
    {
        Payment::create([
            'title' => 'Click',
        ]);

        Payment::create([
            'title' => 'Payme',
        ]);

        Payment::create([
            'title' => 'Uzum bank',
        ]);
    }
}
