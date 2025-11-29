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
        // Feedback given to students based on which grade band their overall score lies.
        Schema::create('quiz_feedback', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('quizid')->default(0)->comment('Foreign key references quiz.id.');
            $table->text('feedbacktext')->comment('The feedback to show for a attempt where mingrade <= attempt grade < maxgrade. See function quiz_feedback_for_grade in mod/quiz/locallib.php.');
            $table->tinyInteger('feedbacktextformat')->default(0);
            $table->decimal('mingrade', 10, 5)->default(0)->comment('The lower limit of this grade band. Inclusive.');
            $table->decimal('maxgrade', 10, 5)->default(0)->comment('The upper limit of this grade band. Exclusive.');

            // Foreign Keys
            $table->foreign('quizid')->references('id')->on('quiz');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_feedback');
    }
};
