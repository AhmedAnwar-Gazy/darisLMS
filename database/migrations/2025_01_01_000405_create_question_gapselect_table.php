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
        // Defines select missing words questions
        Schema::create('question_gapselect', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid')->default(0);
            $table->smallInteger('shuffleanswers')->default(1);
            $table->text('correctfeedback')->comment('Feedback shown for any correct response.');
            $table->tinyInteger('correctfeedbackformat')->default(0);
            $table->text('partiallycorrectfeedback')->comment('Feedback shown for any partially correct response.');
            $table->tinyInteger('partiallycorrectfeedbackformat')->default(0);
            $table->text('incorrectfeedback')->comment('Feedback shown for any incorrect response.');
            $table->tinyInteger('incorrectfeedbackformat')->default(0);
            $table->tinyInteger('shownumcorrect')->default(0);

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_gapselect');
    }
};
