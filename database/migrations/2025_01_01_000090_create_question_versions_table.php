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
        // A join table linking the different question version definitions in the question table to the question_bank_entires.
        Schema::create('question_versions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionbankentryid')->default(0)->comment('ID of the question bank entry this question version is part of.');
            $table->integer('version')->default(1)->comment('Version number for the question where the first version is always 1.');
            $table->unsignedBigInteger('questionid')->default(0)->comment('The question ID.');
            $table->string('status', 10)->default('ready')->comment('If the question is ready, hidden or draft');

            // Foreign Keys
            $table->foreign('questionbankentryid')->references('id')->on('question_bank_entries');
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_versions');
    }
};
