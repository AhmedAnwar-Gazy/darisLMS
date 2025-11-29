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
        // Default settings for activities completion
        Schema::create('course_completion_defaults', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('course');
            $table->unsignedBigInteger('module');
            $table->boolean('completion')->default(0);
            $table->boolean('completionview')->default(0);
            $table->boolean('completionusegrade')->default(0);
            $table->boolean('completionpassgrade')->default(0);
            $table->integer('completionexpected')->default(0);
            $table->text('customrules')->nullable();

            // Unique Indexes
            $table->unique(['course', 'module'], 'coursemodule');

            // Foreign Keys
            $table->foreign('module')->references('id')->on('modules');
            $table->foreign('course')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_completion_defaults');
    }
};
