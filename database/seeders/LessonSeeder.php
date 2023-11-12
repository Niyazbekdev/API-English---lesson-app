<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{

    public function run(): void
    {
        Lesson::create([
           'modul_id' => 1,
            'title' => [
                'latin' => "inglis alipbesi",
                'kiril' => "инглис алипбеси"
            ]
        ]);

    }
}
