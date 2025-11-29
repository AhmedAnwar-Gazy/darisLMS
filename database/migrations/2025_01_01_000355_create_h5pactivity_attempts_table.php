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
        // Users attempts inside H5P activities
        Schema::create('h5pactivity_attempts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('h5pactivityid')->comment('H5P activity ID');
            $table->bigInteger('userid')->comment('Attempt user ID');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->integer('attempt')->default(1)->comment('Attempt number');
            $table->integer('rawscore')->nullable()->default(0);
            $table->integer('maxscore')->nullable()->default(0);
            $table->decimal('scaled', 10, 5)->default(0)->comment('Number 0..1 that reflects the performance of the learner');
            $table->integer('duration')->nullable()->default(0)->comment('Number of second inverted in that attempt (provided by the statement)');
            $table->boolean('completion')->nullable()->comment('Store the xAPI tracking completion result.');
            $table->boolean('success')->nullable()->comment('Store the xAPI tracking success result.');

            // Indexes
            $table->index(['timecreated'], 'timecreated');
            $table->index(['h5pactivityid', 'timecreated'], 'h5pactivityid-timecreated');
            $table->index(['h5pactivityid', 'userid'], 'h5pactivityid-userid');

            // Unique Indexes
            $table->unique(['h5pactivityid', 'userid', 'attempt'], 'uq_activityuserattempt');

            // Foreign Keys
            $table->foreign('h5pactivityid')->references('id')->on('h5pactivity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5pactivity_attempts');
    }
};
