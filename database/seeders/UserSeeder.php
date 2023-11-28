<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {

        User::create([
            'name' => 'John',
            'phone' => '+998905904893',
            'password' => Hash::make('123'),
            'date' => now(),
            'verification_code' => 234987,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Mychael Johnson',
            'phone' => '+998908433902',
            'date' => now(),
            'verification_code' => 389092,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
