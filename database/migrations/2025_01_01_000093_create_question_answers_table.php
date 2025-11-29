<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Answers, with a fractional grade (0-1) and feedback
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0);
            $table->text('answer');
            $table->tinyInteger('answerformat')->default(0);
            $table->decimal('fraction', 12, 7)->default(0);
            $table->text('feedback');
            $table->tinyInteger('feedbackformat')->default(0);

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answers');
    }
};
