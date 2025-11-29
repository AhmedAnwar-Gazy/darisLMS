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
        // branches for each lesson/user
        Schema::create('lesson_branch', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0);
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('pageid')->default(0);
            $table->integer('retry')->default(0);
            $table->tinyInteger('flag')->default(0);
            $table->integer('timeseen')->default(0);
            $table->integer('nextpageid')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('lessonid')->references('id')->on('lesson');
            $table->foreign('pageid')->references('id')->on('lesson_pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_branch');
    }
};
