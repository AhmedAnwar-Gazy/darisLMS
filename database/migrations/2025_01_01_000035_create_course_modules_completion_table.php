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
        // Stores the completion state (completed or not completed, etc) of each user on each activity.
        Schema::create('course_modules_completion', function (Blueprint $table) {
            $table->id('id');
            $table->integer('coursemoduleid')->comment('Activity that has been completed (or not).');
            $table->integer('userid')->comment('ID of user who has (or hasn\'t) completed the activity.');
            $table->boolean('completionstate')->comment('Whether or not the user has completed the activity. Available states: 0 = not completed [if there\'s no row in this table, that also counts as 0] 1 = completed 2 = completed, show passed 3 = completed, show failed');
            $table->integer('overrideby')->nullable()->comment('Tracks whether this completion state has been set manually to override a previous state.');
            $table->integer('timemodified')->comment('Time at which the completion state last changed.');

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
        Schema::dropIfExists('course_modules_completion');
    }
};
