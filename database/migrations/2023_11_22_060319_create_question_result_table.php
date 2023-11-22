<?php

use App\Models\Question;
use App\Models\Result;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('question_result', function (Blueprint $table) {
            $table->foreignIdFor(Result::class)->constrained('results');
            $table->foreignIdFor(Question::class)->constrained('questions');
            $table->json('answers');
            $table->boolean('is_answered')->default(false);
            $table->boolean('is_correct')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_result');
    }
};
