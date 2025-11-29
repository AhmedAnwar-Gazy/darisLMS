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
        // Options for multiple choice questions
        Schema::create('qtype_multichoice_options', function (Blueprint $table) {
            $table->id('id');
            $table->integer('questionid')->default(0)->comment('Foreign key references question.id');
            $table->smallInteger('layout')->default(0)->comment('Not used. Was intended for a vertical/horizontal layout option. See MDL-18445.');
            $table->smallInteger('single')->default(0)->comment('If 0 it multiple response (checkboxes). Otherwise it is radio buttons.');
            $table->smallInteger('shuffleanswers')->default(1)->comment('Whether the choices can be randomly shuffled.');
            $table->text('correctfeedback')->comment('Feedback shown for any correct response.');
            $table->tinyInteger('correctfeedbackformat')->default(0);
            $table->text('partiallycorrectfeedback')->comment('Feedback shown for any partially correct response.');
            $table->tinyInteger('partiallycorrectfeedbackformat')->default(0);
            $table->text('incorrectfeedback')->comment('Feedback shown for any incorrect response.');
            $table->tinyInteger('incorrectfeedbackformat')->default(0);
            $table->string('answernumbering', 10)->default('abc')->comment('Indicates how and whether the choices should be numbered.');
            $table->tinyInteger('shownumcorrect')->default(0)->comment('If true, then when the user gets a multiple-response question partially correct, tell them how many choices they got correct alongside the feedback.');
            $table->tinyInteger('showstandardinstruction')->default(1)->comment('Whether standard instruction (\'Select one:\' or \'Select one or more:\') is displayed');

            // Unique Indexes
            $table->unique(['questionid'], 'questionid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_multichoice_options');
    }
};
