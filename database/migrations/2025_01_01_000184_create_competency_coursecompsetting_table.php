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
        // This table contains the course specific settings for competencies.
        Schema::create('competency_coursecompsetting', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->comment('The course this setting is linked to.');
            $table->tinyInteger('pushratingstouserplans')->nullable()->comment('Does this course push ratings to user plans?');
            $table->integer('timecreated')->comment('The time this setting was created.');
            $table->integer('timemodified')->comment('The time this setting was last modified.');
            $table->unsignedBigInteger('usermodified')->nullable()->comment('The user who last modified this setting');

            // Unique Indexes
            $table->unique(['courseid'], 'courseidlink');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_coursecompsetting');
    }
};
