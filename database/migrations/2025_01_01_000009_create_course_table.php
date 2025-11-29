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
        // Central course table
        Schema::create('course', function (Blueprint $table) {
            $table->id('id');
            $table->integer('category')->default(0);
            $table->integer('sortorder')->default(0);
            $table->string('fullname', 254);
            $table->string('shortname', 255);
            $table->string('idnumber', 100);
            $table->text('summary')->nullable();
            $table->tinyInteger('summaryformat')->default(0);
            $table->string('format', 21)->default('topics');
            $table->tinyInteger('showgrades')->default(1);
            $table->smallInteger('newsitems')->default(1);
            $table->integer('startdate')->default(0);
            $table->integer('enddate')->default(0);
            $table->boolean('relativedatesmode')->default(0)->comment('Whether to let this course display course- or activity-related dates relative to the user\'s enrolment date in this course.');
            $table->integer('marker')->default(0);
            $table->integer('maxbytes')->default(0);
            $table->smallInteger('legacyfiles')->default(0)->comment('course files are not necessary any more: 0 no legacy files, 1 legacy files disabled, 2 legacy files enabled');
            $table->smallInteger('showreports')->default(0);
            $table->boolean('visible')->default(1);
            $table->boolean('visibleold')->default(1)->comment('the state of visible field when hiding parent category, this helps us to recover hidden states when unhiding the parent category later');
            $table->boolean('downloadcontent')->nullable();
            $table->smallInteger('groupmode')->default(0);
            $table->smallInteger('groupmodeforce')->default(0);
            $table->integer('defaultgroupingid')->default(0)->comment('default grouping used in course modules, does not have key intentionally');
            $table->string('lang', 30)->comment('Forced language for this course. Null or \'\' means \'Do not force\'. Otherwise a Moodle lang pack name like \'fr\' or \'en_us\'.');
            $table->string('calendartype', 30);
            $table->string('theme', 50);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->boolean('requested')->default(0);
            $table->boolean('enablecompletion')->default(0)->comment('1 = allow use of \'completion\' progress-tracking on this course. 0 = disable completion tracking on this course.');
            $table->boolean('completionnotify')->default(0)->comment('Notify users when they complete this course');
            $table->integer('cacherev')->default(0)->comment('Incrementing revision for validating the course content cache');
            $table->unsignedBigInteger('originalcourseid')->nullable()->comment('the id of the source course when a new course originates from a restore of another course on the same site.');
            $table->boolean('showactivitydates')->default(0)->comment('Whether to display activity dates to user. 0 = do not display, 1 = display activity dates');
            $table->boolean('showcompletionconditions')->nullable()->comment('Whether to display completion conditions to user. 0 = do not display, 1 = display conditions');
            $table->string('pdfexportfont', 50)->nullable();

            // Indexes
            $table->index(['category'], 'category');
            $table->index(['idnumber'], 'idnumber');
            $table->index(['shortname'], 'shortname');
            $table->index(['sortorder'], 'sortorder');

            // Foreign Keys
            $table->foreign('originalcourseid')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
