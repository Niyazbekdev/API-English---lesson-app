<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{

    public function run(): void
    {
        Rate::create([
            'title' => 'Premium',
            'description' => 'Bul premium',
            'month' => 2,
            'price' => '150000 uzs',
        ]);
    }
}
