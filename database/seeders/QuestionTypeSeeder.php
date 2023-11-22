<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{

    public function run(): void
    {
        QuestionType::create([
            'title' => 'Simple'
        ]);
        QuestionType::create([
            'title' => 'Multiple choice'
        ]);
        QuestionType::create([
            'title' => 'Sequence'
        ]);
        QuestionType::create([
            'title' => 'Drag_and_drop'
        ]);
        QuestionType::create([
            'title' => 'Input'
        ]);
    }
}
