<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Seeder;

class ModulSeeder extends Seeder
{

    public function run(): void
    {
        Modul::create([
            'title' => [
                'latin' => "beginner",
                'kiril' => "бегиннер"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "elementary",
                'kiril' => "елементарий"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Pre-Intermediate",
                'kiril' => "Пре-интермедиате"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Intermediate",
                'kiril' => "интермедиате"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Upper-Intermediate",
                'kiril' => "уппер-интермедиате"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Advanced",
                'kiril' => "эдвенсед"
            ]
        ]);
    }
}
