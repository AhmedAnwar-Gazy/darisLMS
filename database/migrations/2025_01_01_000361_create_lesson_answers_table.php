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
        // Defines lesson_answers
        Schema::create('lesson_answers', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0);
            $table->unsignedBigInteger('pageid')->default(0);
            $table->bigInteger('jumpto')->default(0);
            $table->smallInteger('grade')->default(0);
            $table->integer('score')->default(0);
            $table->tinyInteger('flags')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->text('answer')->nullable();
            $table->tinyInteger('answerformat')->default(0);
            $table->text('response')->nullable();
            $table->tinyInteger('responseformat')->default(0);

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
        Schema::dropIfExists('lesson_answers');
    }
};
