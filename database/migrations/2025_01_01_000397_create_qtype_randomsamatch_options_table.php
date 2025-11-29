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
        // Info about a random short-answer matching question
        Schema::create('qtype_randomsamatch_options', function (Blueprint $table) {
            $table->id('id');
            $table->integer('questionid')->default(0)->comment('Foreign key references question.id.');
            $table->integer('choose')->default(4)->comment('Number of subquestions to randomly generate.');
            $table->tinyInteger('subcats')->default(1)->comment('Whether to include or not the subcategories.');
            $table->text('correctfeedback')->comment('Feedback shown for any correct response.');
            $table->tinyInteger('correctfeedbackformat')->default(0);
            $table->text('partiallycorrectfeedback')->comment('Feedback shown for any partially correct response.');
            $table->tinyInteger('partiallycorrectfeedbackformat')->default(0);
            $table->text('incorrectfeedback')->comment('Feedback shown for any incorrect response.');
            $table->tinyInteger('incorrectfeedbackformat')->default(0);
            $table->tinyInteger('shownumcorrect')->default(0)->comment('If true, then when the user gets the question partially correct, tell them how many choices they got correct alongside the feedback.');

            // Unique Indexes
            $table->unique(['questionid'], 'questionid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_randomsamatch_options');
    }
};
