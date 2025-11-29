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
        // The subquestions that make up a matching question
        Schema::create('qtype_match_subquestions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid')->default(0)->comment('Foreign key link to question.id.');
            $table->text('questiontext');
            $table->tinyInteger('questiontextformat')->default(0);
            $table->string('answertext', 255);

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_match_subquestions');
    }
};
