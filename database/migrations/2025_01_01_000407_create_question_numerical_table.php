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
        // Options for numerical questions.
        Schema::create('question_numerical', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0)->comment('Redundant, because of the answer field. Foreign key references question.id.');
            $table->integer('answer')->default(0)->comment('Foreign key references question_answers.id.');
            $table->string('tolerance', 255)->default(0.0)->comment('Allowed error when matching a response to this answer. I don\'t know why this is stored as a string.');

            // Indexes
            $table->index(['answer'], 'answer');

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_numerical');
    }
};
