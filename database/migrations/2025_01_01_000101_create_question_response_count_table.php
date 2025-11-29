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
        // Count for each responses for each try at a question.
        Schema::create('question_response_count', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('analysisid');
            $table->integer('try');
            $table->integer('rcount');

            // Foreign Keys
            $table->foreign('analysisid')->references('id')->on('question_response_analysis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_response_count');
    }
};
