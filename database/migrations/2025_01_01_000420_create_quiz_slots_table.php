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
        // Stores the question used in a quiz, with the order, and for each question, which page it appears on, and the maximum mark (weight).
        Schema::create('quiz_slots', function (Blueprint $table) {
            $table->id('id');
            $table->integer('slot')->comment('Where this question comes in order in the list of questions in this quiz. Like question_attempts.slot.');
            $table->unsignedBigInteger('quizid')->default(0)->comment('Foreign key references quiz.id.');
            $table->integer('page')->comment('The page number that this questions appears on. If the question in slot n appears on page p, then the question in slot n+1 must appear on page p or p+1. Well, except that when a quiz is being created, there may be empty pages, which would cause the page number to jump here.');
            $table->string('displaynumber', 16)->nullable()->comment('Stores customised question number such as 1.2, A1, B12. If this is null, the default number is used.');
            $table->smallInteger('requireprevious')->default(0)->comment('Set to 1 when current question requires previous one to be answered first.');
            $table->decimal('maxmark', 12, 7)->default(0)->comment('How many marks this question contributes to quiz.sumgrades.');

            // Unique Indexes
            $table->unique(['quizid', 'slot'], 'quizid-slot');

            // Foreign Keys
            $table->foreign('quizid')->references('id')->on('quiz');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_slots');
    }
};
