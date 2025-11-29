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
        // Each row here corresponds to an attempt at one question, as part of a question_usage. A question_attempt will have some question_attempt_steps
        Schema::create('question_attempts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionusageid')->comment('Foreign key, references question_usages.id');
            $table->integer('slot')->comment('Used to number the questions in one attempt sequentially.');
            $table->string('behaviour', 32)->comment('The name of the question behaviour that is managing this question attempt.');
            $table->unsignedBigInteger('questionid')->comment('The id of the question being attempted. Foreign key references question.id.');
            $table->integer('variant')->default(1)->comment('The variant of the qusetion being used.');
            $table->decimal('maxmark', 12, 7)->comment('The grade this question is marked out of in this attempt.');
            $table->decimal('minfraction', 12, 7)->comment('Some questions can award negative marks. This indicates the most negative mark that can be awarded, on the faction scale where the maximum positive mark is 1.');
            $table->decimal('maxfraction', 12, 7)->default(1)->comment('Some questions can give fractions greater than 1. This indicates the greatest fraction that can be awarded.');
            $table->boolean('flagged')->default(0)->comment('Whether this question has been flagged within the attempt.');
            $table->text('questionsummary')->nullable()->comment('If this question uses randomisation, it should set this field to summarise what random version the student actually saw. This is a human-readable textual summary of the student\'s response which might, for example, be used in a report.');
            $table->text('rightanswer')->nullable()->comment('This is a human-readable textual summary of the right answer to this question. Might be used, for example on the quiz preview, to help people who are testing the question. Or might be used in reports.');
            $table->text('responsesummary')->nullable()->comment('This is a textual summary of the student\'s response (basically what you would expect to in the Quiz responses report).');
            $table->integer('timemodified')->comment('The time this record was last changed.');

            // Indexes
            $table->index(['behaviour'], 'behaviour');

            // Unique Indexes
            $table->unique(['questionusageid', 'slot'], 'questionusageid-slot');

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
            $table->foreign('questionusageid')->references('id')->on('question_usages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_attempts');
    }
};
