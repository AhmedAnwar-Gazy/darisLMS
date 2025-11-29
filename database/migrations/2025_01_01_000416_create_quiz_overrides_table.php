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
        // The overrides to quiz settings on a per-user and per-group basis.
        Schema::create('quiz_overrides', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('quiz')->default(0)->comment('Foreign key references quiz.id');
            $table->unsignedBigInteger('groupid')->nullable()->comment('Foreign key references groups.id.  Can be null if this is a per-user override.');
            $table->unsignedBigInteger('userid')->nullable()->comment('Foreign key references user.id.  Can be null if this is a per-group override.');
            $table->integer('timeopen')->nullable()->comment('Time at which students may start attempting this quiz. Can be null, in which case the quiz default is used.');
            $table->integer('timeclose')->nullable()->comment('Time by which students must have completed their attempt.  Can be null, in which case the quiz default is used.');
            $table->integer('timelimit')->nullable()->comment('Time limit in seconds.  Can be null, in which case the quiz default is used.');
            $table->integer('attempts')->nullable();
            $table->string('password', 255)->nullable()->comment('Quiz password.  Can be null, in which case the quiz default is used.');

            // Foreign Keys
            $table->foreign('quiz')->references('id')->on('quiz');
            $table->foreign('groupid')->references('id')->on('groups');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_overrides');
    }
};
