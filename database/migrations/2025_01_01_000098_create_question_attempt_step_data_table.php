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
        // Each question_attempt_step has an associative array of the data that was submitted by the user in the POST request. It can also contain extra data from the question type or behaviour to avoid re-computation. The convention is that names belonging to the behaviour start with -, and cached values added to the submitted data start with _, or _-
        Schema::create('question_attempt_step_data', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('attemptstepid')->comment('Foreign key, references question_attempt_steps.id');
            $table->string('name', 32)->comment('The name of this bit of data.');
            $table->text('value')->nullable()->comment('The corresponding value');

            // Foreign Keys
            $table->foreign('attemptstepid')->references('id')->on('question_attempt_steps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_attempt_step_data');
    }
};
