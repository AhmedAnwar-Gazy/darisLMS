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
        // Stores the the part of the question definition that gives different feedback after each try in interactive and similar behaviours.
        Schema::create('question_hints', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid');
            $table->text('hint')->comment('The text of the feedback to be given.');
            $table->smallInteger('hintformat')->default(0)->comment('The format of the hint.');
            $table->boolean('shownumcorrect')->nullable()->comment('Whether the feedback should include a message about how many things the student got right. This is only applicable to certain question types (for example matching or multiple choice multiple-response).');
            $table->boolean('clearwrong')->nullable()->comment('Whether any wrong choices should be cleared before the next try. Whether this is applicable, and what it means, depends on the question type, as with the shownumright option.');
            $table->string('options', 255)->nullable()->comment('A space for any other question-type specific options.');

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_hints');
    }
};
