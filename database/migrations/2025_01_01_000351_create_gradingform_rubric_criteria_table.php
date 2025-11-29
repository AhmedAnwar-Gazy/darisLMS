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
        // Stores the rows of the rubric grid.
        Schema::create('gradingform_rubric_criteria', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('definitionid')->comment('The ID of the form definition this criterion is part of');
            $table->integer('sortorder')->comment('Defines the order of the criterion in the rubric');
            $table->text('description')->nullable()->comment('The criterion description');
            $table->tinyInteger('descriptionformat')->nullable()->comment('The format of the description field');

            // Foreign Keys
            $table->foreign('definitionid')->references('id')->on('grading_definitions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingform_rubric_criteria');
    }
};
