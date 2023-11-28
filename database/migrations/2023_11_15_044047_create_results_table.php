<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();
            $table->morphs('resultable');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('complated_at')->nullable();
            $table->unsignedSmallInteger('questions_count')->nullable();
            $table->unsignedSmallInteger('correct_questions_count')->nullable();
            $table->unsignedSmallInteger('incorrect_questions_count')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
