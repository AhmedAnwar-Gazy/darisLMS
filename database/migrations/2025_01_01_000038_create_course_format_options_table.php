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
        // Stores format-specific options for the course or course section
        Schema::create('course_format_options', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->comment('Id of the course');
            $table->string('format', 21)->comment('Format this option is for');
            $table->integer('sectionid')->default(0)->comment('Null if this is a course option, otherwise id of the section this option is for');
            $table->string('name', 100)->comment('Name of the format option');
            $table->text('value')->nullable()->comment('Value of the format option');

            // Unique Indexes
            $table->unique(['courseid', 'format', 'sectionid', 'name'], 'formatoption');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_format_options');
    }
};
