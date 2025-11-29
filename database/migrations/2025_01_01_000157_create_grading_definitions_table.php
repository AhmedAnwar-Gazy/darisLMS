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
        // Contains the basic information about an advanced grading form defined in the given gradable area
        Schema::create('grading_definitions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('areaid');
            $table->string('method', 100)->comment('The name of the plugin providing this grading form');
            $table->string('name', 255)->comment('The title of the form that helps users to identify it');
            $table->text('description')->nullable()->comment('More detailed description of the form');
            $table->tinyInteger('descriptionformat')->nullable()->comment('Format of the description field');
            $table->integer('status')->default(0)->comment('Status of the form definition, by default in the under-construction state');
            $table->integer('copiedfromid')->nullable()->comment('The id of the original definition that this was initially copied from or null if it was from scratch');
            $table->integer('timecreated')->comment('The timestamp of when the form definition was created initially');
            $table->unsignedBigInteger('usercreated')->comment('The ID of the user who created this definition and is considered as its owner for access control purposes');
            $table->integer('timemodified')->comment('The time stamp of when the form definition was modified recently');
            $table->unsignedBigInteger('usermodified')->comment('The ID of the user who did the most recent modification');
            $table->integer('timecopied')->nullable()->default(0)->comment('The timestamp of when this form was most recently copied into another area');
            $table->text('options')->nullable()->comment('General field to be used by plugins as a general storage place for their own settings');

            // Unique Indexes
            $table->unique(['areaid', 'method'], 'uq_area_method');

            // Foreign Keys
            $table->foreign('areaid')->references('id')->on('grading_areas');
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('usercreated')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grading_definitions');
    }
};
