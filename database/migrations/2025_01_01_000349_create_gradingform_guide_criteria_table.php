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
        // Stores the rows of the criteria grid.
        Schema::create('gradingform_guide_criteria', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('definitionid')->comment('The ID of the form definition this criterion is part of');
            $table->integer('sortorder')->comment('Defines the order of the criterion in the guide');
            $table->string('shortname', 255)->comment('shortname of this criterion');
            $table->text('description')->nullable()->comment('The criterion description for students');
            $table->tinyInteger('descriptionformat')->nullable()->comment('The format of the description field');
            $table->text('descriptionmarkers')->nullable()->comment('Description for Markers');
            $table->tinyInteger('descriptionmarkersformat')->nullable();
            $table->decimal('maxscore', 10, 5)->comment('maximum grade that can be assigned using this criterion');

            // Foreign Keys
            $table->foreign('definitionid')->references('id')->on('grading_definitions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingform_guide_criteria');
    }
};
