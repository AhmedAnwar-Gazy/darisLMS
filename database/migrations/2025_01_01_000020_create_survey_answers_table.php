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
        // the answers to each questions filled by the users
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('survey')->default(0);
            $table->unsignedBigInteger('question')->default(0);
            $table->integer('time')->default(0);
            $table->text('answer1');
            $table->text('answer2');

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('survey')->references('id')->on('survey');
            $table->foreign('question')->references('id')->on('survey_questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_answers');
    }
};
