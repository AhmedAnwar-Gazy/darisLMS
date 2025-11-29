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
        // Course completion criteria
        Schema::create('course_completion_criteria', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->integer('criteriatype')->default(0)->comment('Type of criteria');
            $table->string('module', 100)->nullable()->comment('Type of module (if using module criteria type)');
            $table->integer('moduleinstance')->nullable()->comment('Course module id (if using module criteria type)');
            $table->integer('courseinstance')->nullable()->comment('Course instance id (if using course criteria type)');
            $table->integer('enrolperiod')->nullable()->comment('Number of days after enrolment the course is completed (if using enrolperiod criteria type)');
            $table->integer('timeend')->nullable()->comment('Timestamp of the date for course completion (if using date criteria type)');
            $table->decimal('gradepass', 10, 5)->nullable()->comment('The minimum grade needed to pass the course (if passing grade criteria enabled)');
            $table->integer('role')->nullable();

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_completion_criteria');
    }
};
