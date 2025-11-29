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
        // This table keeps information about student interactions with the mod/assign. This is limited to metadata about a student submission but does not include the submission itself which is stored by plugins.
        Schema::create('assign_submission', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('timecreated')->default(0)->comment('The time of the first student submission to this assignment.');
            $table->integer('timemodified')->default(0)->comment('The last time this assignment submission was modified by a student.');
            $table->integer('timestarted')->nullable()->comment('The time when the student stared the submission.');
            $table->string('status', 10)->nullable()->comment('The status of this assignment submission. The current statuses are DRAFT and SUBMITTED.');
            $table->integer('groupid')->default(0)->comment('The group id for team submissions');
            $table->integer('attemptnumber')->default(0)->comment('Used to track attempts for an assignment');
            $table->tinyInteger('latest')->default(0)->comment('Greatly simplifies queries wanting to know information about only the latest attempt.');

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['attemptnumber'], 'attemptnumber');
            $table->index(['assignment', 'userid', 'groupid', 'latest'], 'latestattempt');

            // Unique Indexes
            $table->unique(['assignment', 'userid', 'groupid', 'attemptnumber'], 'uniqueattemptsubmission');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_submission');
    }
};
