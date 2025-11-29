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
        Schema::create('qtype_ordering_options', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('questionid')->default(0);
            $table->tinyInteger('layouttype')->default(0);
            $table->tinyInteger('selecttype')->default(0);
            $table->smallInteger('selectcount')->default(2);
            $table->tinyInteger('gradingtype')->default(0);
            $table->tinyInteger('showgrading')->default(0);
            $table->string('numberingstyle', 10)->default('none');
            $table->text('correctfeedback')->nullable();
            $table->tinyInteger('correctfeedbackformat')->default(0);
            $table->text('incorrectfeedback')->nullable();
            $table->tinyInteger('incorrectfeedbackformat')->default(0);
            $table->text('partiallycorrectfeedback')->nullable();
            $table->tinyInteger('partiallycorrectfeedbackformat')->default(0);
            $table->tinyInteger('shownumcorrect')->default(0);

            // Unique Indexes
            $table->unique(['questionid'], 'qtypordeopti_que_uix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_ordering_options');
    }
};
