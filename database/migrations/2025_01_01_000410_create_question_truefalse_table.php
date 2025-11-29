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
        // Options for True-False questions
        Schema::create('question_truefalse', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0)->comment('Foreign key references question.id.');
            $table->integer('trueanswer')->default(0)->comment('Foreign key references question_answers.id. The \'True\' choice.');
            $table->integer('falseanswer')->default(0)->comment('Foreign key references question_answers.id. The \'False\' choice.');
            $table->tinyInteger('showstandardinstruction')->default(1)->comment('Whether standard instruction (\'Select one:\') is displayed');

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_truefalse');
    }
};
