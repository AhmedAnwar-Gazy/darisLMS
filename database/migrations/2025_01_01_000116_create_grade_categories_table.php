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
        // This table keeps information about categories, used for grouping items.
        Schema::create('grade_categories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->comment('The course this grade category is part of');
            $table->unsignedBigInteger('parent')->nullable()->comment('Categories can be hierarchical');
            $table->integer('depth')->default(0)->comment('How many parents does this category have?');
            $table->string('path', 255)->nullable()->comment('shows the path as /1/2/3 (like course_categories)');
            $table->string('fullname', 255)->comment('The name of this grade category');
            $table->integer('aggregation')->default(0)->comment('A constant pointing to one of the predefined aggregation strategies (none, mean,median,sum, etc)');
            $table->integer('keephigh')->default(0)->comment('Keep only the X highest items');
            $table->integer('droplow')->default(0)->comment('Drop the X lowest items');
            $table->boolean('aggregateonlygraded')->default(0)->comment('aggregate only graded activities');
            $table->boolean('aggregateoutcomes')->default(0)->comment('Aggregate outcomes');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->integer('hidden')->default(0);

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('parent')->references('id')->on('grade_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_categories');
    }
};
