<?php

namespace Database\Seeders;

use App\Models\TypeLesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeLessonSeeder extends Seeder
{

    public function run(): void
    {
        TypeLesson::create([
            'title' => 'Text',
        ]);

        TypeLesson::create([
            'title' => 'content'
        ]);
    }
}
