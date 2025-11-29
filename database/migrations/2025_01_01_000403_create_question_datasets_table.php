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
        // Many-many relation between questions and dataset definitions
        Schema::create('question_datasets', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0);
            $table->unsignedBigInteger('datasetdefinition')->default(0);

            // Indexes
            $table->index(['question', 'datasetdefinition'], 'question-datasetdefinition');

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
            $table->foreign('datasetdefinition')->references('id')->on('question_dataset_definitions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_datasets');
    }
};
