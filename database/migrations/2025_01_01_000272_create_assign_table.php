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
        // This table saves information about an instance of mod_assign in a course.
        Schema::create('assign', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255)->comment('The name of the instance of the assignment. Displayed at the top of each page.');
            $table->text('intro')->comment('The description of the assignment. This field is used by feature MOD_INTRO.');
            $table->smallInteger('introformat')->default(0)->comment('The format of the description field of the assignment. This field is used by feature MOD_INTRO.');
            $table->tinyInteger('alwaysshowdescription')->default(0)->comment('If false the assignment intro will only be displayed after the allowsubmissionsfrom date. If true it will always be displayed.');
            $table->tinyInteger('nosubmissions')->default(0)->comment('This field is a cache for is_any_submission_plugin_enabled() which allows Moodle pages to distinguish offline assignment types without loading the assignment class.');
            $table->tinyInteger('submissiondrafts')->default(0)->comment('If true, assignment submissions will be considered drafts until the student clicks on the submit assignmnet button.');
            $table->tinyInteger('sendnotifications')->default(0)->comment('Allows the disabling of email notifications in the assign module.');
            $table->tinyInteger('sendlatenotifications')->default(0)->comment('Allows separate enabling of notifications for late assignment submissions.');
            $table->integer('duedate')->default(0)->comment('The due date for the assignment. Displayed to students.');
            $table->integer('allowsubmissionsfromdate')->default(0)->comment('If set, submissions will only be accepted after this date.');
            $table->integer('grade')->default(0)->comment('The maximum grade for this assignment. Can be negative to indicate the use of a scale.');
            $table->integer('timemodified')->default(0)->comment('The time the settings for this assign module instance were last modified.');
            $table->tinyInteger('requiresubmissionstatement')->default(0)->comment('Forces the student to accept a submission statement when submitting an assignment');
            $table->tinyInteger('completionsubmit')->default(0)->comment('If this field is set to 1, then the activity will be automatically marked as \'complete\' once the user submits their assignment.');
            $table->integer('cutoffdate')->default(0)->comment('The final date after which submissions will no longer be accepted for this assignment without an extensions.');
            $table->integer('gradingduedate')->default(0)->comment('The expected date for marking the submissions.');
            $table->tinyInteger('teamsubmission')->default(0)->comment('Do students submit in teams?');
            $table->tinyInteger('requireallteammemberssubmit')->default(0)->comment('If enabled, a submission will not be accepted until all team members have submitted it.');
            $table->integer('teamsubmissiongroupingid')->default(0)->comment('A grouping id to get groups for team submissions');
            $table->tinyInteger('blindmarking')->default(0)->comment('Hide student/grader identities until the reveal identities action is performed');
            $table->tinyInteger('hidegrader')->default(0)->comment('Hide the grader\'s identity from students. The opposite of blind marking.');
            $table->tinyInteger('revealidentities')->default(0)->comment('Show identities for a blind marking assignment');
            $table->string('attemptreopenmethod', 10)->default('none')->comment('How to determine when students are allowed to open a new submission. Valid options are none, manual, untilpass');
            $table->integer('maxattempts')->default(-1)->comment('What is the maximum number of student attempts allowed for this assignment? -1 means unlimited.');
            $table->tinyInteger('markingworkflow')->default(0)->comment('If enabled, marking workflow features will be used in this assignment.');
            $table->tinyInteger('markingallocation')->default(0)->comment('If enabled, marking allocation features will be used in this assignment');
            $table->tinyInteger('sendstudentnotifications')->default(1)->comment('Default for send student notifications checkbox when grading.');
            $table->tinyInteger('preventsubmissionnotingroup')->default(0)->comment('If enabled a user will be unable to make a submission unless they are a member of a group.');
            $table->text('activity')->nullable();
            $table->smallInteger('activityformat')->default(0);
            $table->integer('timelimit')->default(0);
            $table->tinyInteger('submissionattachments')->default(0);

            // Indexes
            $table->index(['course'], 'course');
            $table->index(['teamsubmissiongroupingid'], 'teamsubmissiongroupingid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign');
    }
};
