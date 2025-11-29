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
        // Stores one step in in a question attempt. As well as the data here, the step will have some data in the question_attempt_step_data table.
        Schema::create('question_attempt_steps', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionattemptid')->comment('Foreign key, references question_attempt.id');
            $table->integer('sequencenumber')->comment('Numbers the steps in a question attempt sequentially from 0.');
            $table->string('state', 13)->comment('One of the constants defined by the question_state class, giving the state of the question at the end of this step.');
            $table->decimal('fraction', 12, 7)->nullable()->comment('The grade for this question, when graded out of 1. Needs to be multiplied by question_attempt.maxmark to get the actual mark for the question.');
            $table->integer('timecreated')->comment('Time-stamp of the action that lead to this state being created.');
            $table->unsignedBigInteger('userid')->nullable()->comment('The user whose action lead to this state being created.');

            // Unique Indexes
            $table->unique(['questionattemptid', 'sequencenumber'], 'questionattemptid-sequencenumber');

            // Foreign Keys
            $table->foreign('questionattemptid')->references('id')->on('question_attempts');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_attempt_steps');
    }
};
