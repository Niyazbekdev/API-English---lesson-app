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
            'name' => 'Simple'
        ]);
        QuestionType::create([
            'name' => 'Multiple choice'
        ]);
        QuestionType::create([
            'name' => 'Sequence'
        ]);
        QuestionType::create([
            'name' => 'Drag_and_drop'
        ]);
        QuestionType::create([
            'name' => 'Input'
        ]);
    }
}
