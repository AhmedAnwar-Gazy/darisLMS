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
        // Defines lesson_attempts
        Schema::create('lesson_attempts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0);
            $table->unsignedBigInteger('pageid')->default(0);
            $table->integer('userid')->default(0);
            $table->unsignedBigInteger('answerid')->default(0);
            $table->tinyInteger('retry')->default(0);
            $table->integer('correct')->default(0);
            $table->text('useranswer')->nullable();
            $table->integer('timeseen')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('lessonid')->references('id')->on('lesson');
            $table->foreign('pageid')->references('id')->on('lesson_pages');
            $table->foreign('answerid')->references('id')->on('lesson_answers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_attempts');
    }
};
