<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ModulSeeder::class,
            TypeLessonSeeder::class,
            LessonSeeder::class,
            QuestionTypeSeeder::class,
            QuizSeeder::class,
            PaymentSeeder::class,
            RateSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
