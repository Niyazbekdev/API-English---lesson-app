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
            ],
            'description' => [
                'latin' => "baslangish bilim",
                'kiril' => "вшшулу"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "elementary",
                'kiril' => "елементарий"
            ],
            'description' => [
                'latin' => "baslangish bilim",
                'kiril' => "вшшулу"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Pre-Intermediate",
                'kiril' => "Пре-интермедиате"
            ],
            'description' => [
                'latin' => "baslangish bilim",
                'kiril' => "вшшулу"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Intermediate",
                'kiril' => "интермедиате"
            ],
            'description' => [
                'latin' => "baslangish bilim",
                'kiril' => "вшшулу"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Upper-Intermediate",
                'kiril' => "уппер-интермедиате"
            ],
            'description' => [
                'latin' => "baslangish bilim",
                'kiril' => "вшшулу"
            ]
        ]);

        Modul::create([
            'title' => [
                'latin' => "Advanced",
                'kiril' => "эдвенсед"
            ],
            'description' => [
                'latin' => "baslangish bilim",
                'kiril' => "вшшулу"
            ]
        ]);
    }
}
