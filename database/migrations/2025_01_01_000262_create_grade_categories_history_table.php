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
        // History of grade_categories
        Schema::create('grade_categories_history', function (Blueprint $table) {
            $table->id('id');
            $table->integer('action')->default(0)->comment('created/modified/deleted constants');
            $table->unsignedBigInteger('oldid');
            $table->string('source', 255)->nullable()->comment('What caused the modification? manual/module/import/...');
            $table->integer('timemodified')->nullable()->comment('The last time this grade_item was modified');
            $table->unsignedBigInteger('loggeduser')->nullable()->comment('the userid of the person who last modified this outcome');
            $table->unsignedBigInteger('courseid')->comment('The course this grade category is part of');
            $table->unsignedBigInteger('parent')->nullable()->comment('Categories can be hierarchical');
            $table->integer('depth')->default(0)->comment('How many parents does this category have?');
            $table->string('path', 255)->nullable()->comment('shows the path as /1/2/3 (like course_categories)');
            $table->string('fullname', 255)->comment('The name of this grade category');
            $table->integer('aggregation')->default(0)->comment('A constant pointing to one of the predefined aggregation strategies (none, mean,median,sum, etc)');
            $table->integer('keephigh')->default(0)->comment('Keep only the X highest items');
            $table->integer('droplow')->default(0)->comment('Drop the X lowest items');
            $table->boolean('aggregateonlygraded')->default(0)->comment('aggregate only graded items');
            $table->boolean('aggregateoutcomes')->default(0)->comment('Aggregate outcomes');
            $table->boolean('aggregatesubcats')->default(0)->comment('This setting was removed from grade_categories. It is kept here only to preserve history.');
            $table->integer('hidden')->default(0);

            // Indexes
            $table->index(['action'], 'action');
            $table->index(['timemodified'], 'timemodified');

            // Foreign Keys
            $table->foreign('oldid')->references('id')->on('grade_categories');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('parent')->references('id')->on('grade_categories');
            $table->foreign('loggeduser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_categories_history');
    }
};
