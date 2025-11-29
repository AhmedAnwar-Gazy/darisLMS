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
        // This table\'s main purpose it to assign a unique id to each attempt at a set of questions by some part of Moodle. A question usage is made up of a number of question_attempts.
        Schema::create('question_usages', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->comment('Every question usage must be associated with some context.');
            $table->string('component', 255)->comment('The plugin this attempt belongs to, e.g. \'mod_quiz\', \'block_questionoftheday\', \'filter_embedquestion\'.');
            $table->string('preferredbehaviour', 32)->comment('The archetypal behaviour that should be used for question attempts in this usage.');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_usages');
    }
};
