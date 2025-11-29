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
        // Info about the made assessment and automatically calculated grade for it. The proposed grade can be overridden by teacher.
        Schema::create('workshop_assessments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('submissionid')->comment('The id of the assessed submission');
            $table->unsignedBigInteger('reviewerid')->comment('The id of the reviewer who makes this assessment');
            $table->integer('weight')->default(1)->comment('The weight of the assessment for the purposes of aggregation');
            $table->integer('timecreated')->nullable()->default(0)->comment('If 0 then the assessment was allocated but the reviewer has not assessed yet. If greater than 0 then the timestamp of when the reviewer assessed for the first time');
            $table->integer('timemodified')->nullable()->default(0)->comment('If 0 then the assessment was allocated but the reviewer has not assessed yet. If greater than 0 then the timestamp of when the reviewer assessed for the last time');
            $table->decimal('grade', 10, 5)->nullable()->comment('The aggregated grade for submission suggested by the reviewer. The grade 0..100 is computed from the values assigned to the assessment dimensions fields. If NULL then it has not been aggregated yet.');
            $table->decimal('gradinggrade', 10, 5)->nullable()->comment('The computed grade 0..100 for this assessment. If NULL then it has not been computed yet.');
            $table->decimal('gradinggradeover', 10, 5)->nullable()->comment('Grade for the assessment manually overridden by a teacher. Grade is always from interval 0..100. If NULL then the grade is not overriden.');
            $table->unsignedBigInteger('gradinggradeoverby')->nullable()->comment('The id of the user who has overridden the grade for submission.');
            $table->text('feedbackauthor')->nullable()->comment('The comment/feedback from the reviewer for the author.');
            $table->tinyInteger('feedbackauthorformat')->nullable()->default(0);
            $table->tinyInteger('feedbackauthorattachment')->nullable()->default(0)->comment('Are there some files attached to the feedbackauthor field? Sets to 1 by file_postupdate_standard_filemanager().');
            $table->text('feedbackreviewer')->nullable()->comment('The comment/feedback from the teacher for the reviewer. For example the reason why the grade for assessment was overridden');
            $table->tinyInteger('feedbackreviewerformat')->nullable()->default(0);

            // Foreign Keys
            $table->foreign('submissionid')->references('id')->on('workshop_submissions');
            $table->foreign('gradinggradeoverby')->references('id')->on('users');
            $table->foreign('reviewerid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_assessments');
    }
};
