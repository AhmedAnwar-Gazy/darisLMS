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
        // Course categories
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->string('idnumber', 100)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('descriptionformat')->default(0);
            $table->unsignedBigInteger('parent')->default(0);
            $table->integer('sortorder')->default(0);
            $table->integer('coursecount')->default(0);
            $table->boolean('visible')->default(1);
            $table->boolean('visibleold')->default(1)->comment('the state of visible field when hiding parent category, this helps us to recover hidden states when unhiding the parent category later');
            $table->integer('timemodified')->default(0);
            $table->integer('depth')->default(0);
            $table->string('path', 255);
            $table->string('theme', 50)->nullable()->comment('Theme for the category');

            // Foreign Keys
            $table->foreign('parent')->references('id')->on('course_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_categories');
    }
};
