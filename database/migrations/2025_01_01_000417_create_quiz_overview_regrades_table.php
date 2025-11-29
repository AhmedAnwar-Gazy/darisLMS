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
        // This table records which question attempts need regrading and the grade they will be regraded to.
        Schema::create('quiz_overview_regrades', function (Blueprint $table) {
            $table->id('id');
            $table->integer('questionusageid')->comment('Foreign key references question_usages.id, or equivalently quiz_attempt.uniqueid.');
            $table->integer('slot')->comment('Foreign key, references question_attempts.slot');
            $table->decimal('newfraction', 12, 7)->nullable()->comment('The new fraction for this question_attempt after regrading.');
            $table->decimal('oldfraction', 12, 7)->nullable()->comment('The previous fraction for this question_attempt.');
            $table->smallInteger('regraded')->comment('set to 0 if element has just been regraded. Set to 1 if element has been marked as needing regrading.');
            $table->integer('timemodified')->comment('Timestamp of when this row was last modified.');

            // Foreign Keys
            // Note: Composite FK not supported in Laravel - references question_attempts(questionusageid, slot)
            // $table->foreign('questionusageid')->references('questionusageid, slot')->on('question_attempts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_overview_regrades');
    }
};
