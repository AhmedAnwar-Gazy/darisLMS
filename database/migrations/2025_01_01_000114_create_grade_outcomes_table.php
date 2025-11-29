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
        // This table describes the outcomes used in the system. An outcome is a statement tied to a rubric scale from low to high, such as âNot met, Borderline, Metâ (stored as 0,1 or 2)
        Schema::create('grade_outcomes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->nullable()->comment('Mostly these are defined site wide ie NULL');
            $table->string('shortname', 255)->comment('The short name or code for this outcome statement');
            $table->text('fullname')->comment('The full description of the outcome (usually 1 sentence)');
            $table->unsignedBigInteger('scaleid')->nullable()->comment('The recommended scale for this outcome.');
            $table->text('description')->nullable()->comment('outcome description');
            $table->tinyInteger('descriptionformat')->default(0);
            $table->integer('timecreated')->nullable()->comment('the time this outcome was first created');
            $table->integer('timemodified')->nullable()->comment('the time this outcome was last updated');
            $table->unsignedBigInteger('usermodified')->nullable()->comment('the userid of the person who last modified this outcome');

            // Unique Indexes
            $table->unique(['courseid', 'shortname'], 'courseid-shortname');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('scaleid')->references('id')->on('scale');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_outcomes');
    }
};
