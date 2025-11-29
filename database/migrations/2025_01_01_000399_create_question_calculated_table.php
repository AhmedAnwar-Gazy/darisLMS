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
        // Options for questions of type calculated
        Schema::create('question_calculated', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0);
            $table->integer('answer')->default(0);
            $table->string('tolerance', 20)->default(0.0);
            $table->integer('tolerancetype')->default(1);
            $table->integer('correctanswerlength')->default(2);
            $table->integer('correctanswerformat')->default(2);

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
        Schema::dropIfExists('question_calculated');
    }
};
