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
        // Aggregated grades for assessment are stored here. The aggregated grade for submission is stored in workshop_submissions
        Schema::create('workshop_aggregations', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('workshopid')->comment('the id of the workshop instance');
            $table->unsignedBigInteger('userid')->comment('The id of the user which aggregated grades are calculated for');
            $table->decimal('gradinggrade', 10, 5)->nullable()->comment('The aggregated grade for all assessments made by this reviewer. The grade is a number from interval 0..100. If NULL then the grade for assessments has not been aggregated yet.');
            $table->integer('timegraded')->nullable()->comment('The timestamp of when the participant\'s gradinggrade was recently aggregated.');

            // Unique Indexes
            $table->unique(['workshopid', 'userid'], 'workshopuser');

            // Foreign Keys
            $table->foreign('workshopid')->references('id')->on('workshop');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_aggregations');
    }
};
