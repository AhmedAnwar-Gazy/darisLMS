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
        // The overrides to lesson settings.
        Schema::create('lesson_overrides', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('lessonid')->default(0)->comment('Foreign key references lesson.id');
            $table->unsignedBigInteger('groupid')->nullable()->comment('Foreign key references groups.id.  Can be null if this is a per-user override.');
            $table->unsignedBigInteger('userid')->nullable()->comment('Foreign key references user.id.  Can be null if this is a per-group override.');
            $table->integer('available')->nullable()->comment('Time at which students may start attempting this lesson. Can be null, in which case the lesson default is used.');
            $table->integer('deadline')->nullable()->comment('Time by which students must have completed their attempt.  Can be null, in which case the lesson default is used.');
            $table->integer('timelimit')->nullable()->comment('Time limit in seconds.  Can be null, in which case the lesson default is used.');
            $table->tinyInteger('review')->nullable();
            $table->tinyInteger('maxattempts')->nullable();
            $table->tinyInteger('retake')->nullable();
            $table->string('password', 32)->nullable()->comment('Lesson password.  Can be null, in which case the lesson default is used.');

            // Foreign Keys
            $table->foreign('lessonid')->references('id')->on('lesson');
            $table->foreign('groupid')->references('id')->on('groups');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_overrides');
    }
};
