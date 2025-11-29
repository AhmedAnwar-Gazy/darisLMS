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
        // The overrides to assign settings.
        Schema::create('assign_overrides', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignid')->default(0)->comment('Foreign key references assign.id');
            $table->unsignedBigInteger('groupid')->nullable()->comment('Foreign key references groups.id.  Can be null if this is a per-user override.');
            $table->unsignedBigInteger('userid')->nullable()->comment('Foreign key references user.id.  Can be null if this is a per-group override.');
            $table->integer('sortorder')->nullable()->comment('Rank for sorting overrides.');
            $table->integer('allowsubmissionsfromdate')->nullable()->comment('Time at which students may start attempting this assign. Can be null, in which case the assign default is used.');
            $table->integer('duedate')->nullable()->comment('Time by which students must have completed their attempt.  Can be null, in which case the assign default is used.');
            $table->integer('cutoffdate')->nullable()->comment('Time by which students must have completed their attempt.  Can be null, in which case the assign default is used.');
            $table->integer('timelimit')->nullable()->comment('Time limit in seconds. Can be null, in which case the quiz default is used.');

            // Foreign Keys
            $table->foreign('assignid')->references('id')->on('assign');
            $table->foreign('groupid')->references('id')->on('groups');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_overrides');
    }
};
