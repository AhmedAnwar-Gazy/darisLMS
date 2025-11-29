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
        // Each question bank entry. This table has one row for each question that appears in the question bank.
        Schema::create('question_bank_entries', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questioncategoryid')->default(0)->comment('ID of the category this question is part of.');
            $table->string('idnumber', 100)->nullable()->comment('Unique identifier, useful especially for mapping to external entities.');
            $table->unsignedBigInteger('ownerid')->nullable()->comment('userid of person who owns this question bank entry.');

            // Unique Indexes
            $table->unique(['questioncategoryid', 'idnumber'], 'categoryidnumber');

            // Foreign Keys
            $table->foreign('questioncategoryid')->references('id')->on('question_categories');
            $table->foreign('ownerid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_bank_entries');
    }
};
