<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{

    public function run(): void
    {
        Quiz::create([
           'title' => [
               'latin' => "Daslepki test",
               'kiril' => "даслепки тест"
           ],
            'description' => [
                'latin' => 'descirption',
                'kiril' => 'дескриптион'
            ]
        ]);
    }
}
