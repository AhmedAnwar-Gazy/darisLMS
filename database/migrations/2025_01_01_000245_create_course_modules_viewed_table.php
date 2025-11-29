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
        // Tracks the completion viewed (viewed with cmid/userid and otherwise no row) of each user on each activity.
        Schema::create('course_modules_viewed', function (Blueprint $table) {
            $table->id('id');
            $table->integer('coursemoduleid')->comment('Activity that has been viewed (or not).');
            $table->integer('userid')->comment('ID of user who has (or hasn\'t) viewed the activity.');
            $table->integer('timecreated')->comment('Time at which the completion viewed created.');

            // Indexes
            $table->index(['coursemoduleid'], 'coursemoduleid');

            // Unique Indexes
            $table->unique(['userid', 'coursemoduleid'], 'userid-coursemoduleid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_modules_viewed');
    }
};
