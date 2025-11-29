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
        // Stores the columns of the rubric grid.
        Schema::create('gradingform_rubric_levels', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('criterionid')->comment('The rubric criterion we are level of');
            $table->decimal('score', 10, 5)->comment('The score for this level');
            $table->text('definition')->nullable()->comment('The optional text describing the level');
            $table->integer('definitionformat')->nullable()->comment('The format of the definition field');

            // Foreign Keys
            $table->foreign('criterionid')->references('id')->on('gradingform_rubric_criteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingform_rubric_levels');
    }
};
