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
        // Stores the h5pactivity activity module instances.
        Schema::create('h5pactivity', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('course')->comment('ID of the course this activity is part of.');
            $table->string('name', 255)->comment('The name of the activity module instance');
            $table->integer('timecreated')->comment('Timestamp of when the instance was added to the course.');
            $table->integer('timemodified')->comment('Timestamp of when the instance was last modified.');
            $table->text('intro')->nullable()->comment('Activity description.');
            $table->smallInteger('introformat')->default(0)->comment('The format of the intro field.');
            $table->integer('grade')->nullable()->default(0);
            $table->smallInteger('displayoptions')->default(0)->comment('H5P Button display options');
            $table->boolean('enabletracking')->default(1)->comment('Enable xAPI tracking');
            $table->smallInteger('grademethod')->default(1)->comment('Which H5P attempt is used for grading');
            $table->smallInteger('reviewmode')->nullable()->default(1);

            // Foreign Keys
            $table->foreign('course')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5pactivity');
    }
};
