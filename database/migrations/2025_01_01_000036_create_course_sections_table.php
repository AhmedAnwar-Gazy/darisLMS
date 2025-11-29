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
        // to define the sections for each course
        Schema::create('course_sections', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->integer('section')->default(0);
            $table->string('name', 255)->nullable();
            $table->text('summary')->nullable();
            $table->tinyInteger('summaryformat')->default(0);
            $table->text('sequence')->nullable();
            $table->boolean('visible')->default(1);
            $table->text('availability')->nullable()->comment('Availability restrictions for viewing this section, in JSON format. Null if no restrictions.');
            $table->integer('timemodified')->default(0)->comment('Time at which the course section was last changed.');

            // Unique Indexes
            $table->unique(['course', 'section'], 'course_section');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_sections');
    }
};
