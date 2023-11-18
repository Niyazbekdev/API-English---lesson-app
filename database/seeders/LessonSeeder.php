<?php

namespace Database\Seeders;

use App\Models\Lesson;
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
            ],
            'type_lesson_id' => 1,
        ]);

        Lesson::create([
            'modul_id' => 1,
            'title' => [
                'latin' => "dawisli sesler",
                'kiril' => "дауыслы сеслер"
            ],
            'type_lesson_id' => 1,
        ]);

    }
}
