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
        // Link a competency to a course.
        Schema::create('competency_coursecomp', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->comment('The course this competency is linked to.');
            $table->unsignedBigInteger('competencyid')->comment('The competency that is linked to this course.');
            $table->tinyInteger('ruleoutcome')->comment('The rule that applies to the competency when the course is completed.');
            $table->integer('timecreated')->comment('The time this link was created.');
            $table->integer('timemodified')->comment('The time this link was modified.');
            $table->unsignedBigInteger('usermodified')->comment('The user who modified this link.');
            $table->integer('sortorder')->comment('The display order for this link.');

            // Indexes
            $table->index(['courseid', 'ruleoutcome'], 'courseidruleoutcome');

            // Unique Indexes
            $table->unique(['courseid', 'competencyid'], 'courseidcompetencyid');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('competencyid')->references('id')->on('competency');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_coursecomp');
    }
};
