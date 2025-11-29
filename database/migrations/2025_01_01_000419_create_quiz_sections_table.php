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
        // Stores sections of a quiz with section name (heading), from slot-number N and whether the question order should be shuffled.
        Schema::create('quiz_sections', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('quizid')->comment('Foreign key references quiz.id.');
            $table->integer('firstslot')->comment('Number of the first slot in the section. The section runs from here to the start of the next section, or the end of the quiz.');
            $table->text('heading')->nullable()->comment('The text of the heading. May be an empty string/null. Multilang format.');
            $table->smallInteger('shufflequestions')->default(0)->comment('Whether the question order within this section should be shuffled for each attempt.');

            // Unique Indexes
            $table->unique(['quizid', 'firstslot'], 'quizid-firstslot');

            // Foreign Keys
            $table->foreign('quizid')->references('id')->on('quiz');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_sections');
    }
};
