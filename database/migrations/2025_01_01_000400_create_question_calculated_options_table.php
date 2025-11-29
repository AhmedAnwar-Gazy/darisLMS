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
        // Options for questions of type calculated
        Schema::create('question_calculated_options', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0);
            $table->tinyInteger('synchronize')->default(0);
            $table->smallInteger('single')->default(0)->comment('If 0 it multiple response (checkboxes). Otherwise it is radio buttons.');
            $table->smallInteger('shuffleanswers')->default(0)->comment('Whether the choices can be randomly shuffled.');
            $table->text('correctfeedback')->nullable()->comment('Feedback shown for any correct response.');
            $table->tinyInteger('correctfeedbackformat')->default(0);
            $table->text('partiallycorrectfeedback')->nullable()->comment('Feedback shown for any partially correct response.');
            $table->tinyInteger('partiallycorrectfeedbackformat')->default(0);
            $table->text('incorrectfeedback')->nullable()->comment('Feedback shown for any incorrect response.');
            $table->tinyInteger('incorrectfeedbackformat')->default(0);
            $table->string('answernumbering', 10)->default('abc')->comment('Indicates how and whether the choices should be numbered.');
            $table->tinyInteger('shownumcorrect')->default(0)->comment('If true, then when the user gets a multiple-response question partially correct, tell them how many choices they got correct alongside the feedback.');

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_calculated_options');
    }
};
