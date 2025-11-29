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
        // User competencies in a course
        Schema::create('competency_usercompcourse', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->comment('User associated to the competency.');
            $table->integer('courseid')->comment('The course this competency is linked to.');
            $table->integer('competencyid')->comment('Competency associated to the user.');
            $table->tinyInteger('proficiency')->nullable()->comment('Indicate if the competency is proficient not.');
            $table->integer('grade')->nullable()->comment('The course grade assigned for the competency.');
            $table->integer('timecreated');
            $table->integer('timemodified')->nullable();
            $table->unsignedBigInteger('usermodified');

            // Unique Indexes
            $table->unique(['userid', 'courseid', 'competencyid'], 'useridcoursecomp');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competency_usercompcourse');
    }
};
