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
        // stores what outcomes are used in what courses.
        Schema::create('grade_outcomes_courses', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->comment('id of the course');
            $table->unsignedBigInteger('outcomeid')->comment('id of the outcome');

            // Unique Indexes
            $table->unique(['courseid', 'outcomeid'], 'courseid-outcomeid');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('outcomeid')->references('id')->on('grade_outcomes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_outcomes_courses');
    }
};
