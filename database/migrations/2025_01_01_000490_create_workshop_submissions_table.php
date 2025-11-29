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
        // Info about the submission and the aggregation of the grade for submission, grade for assessment and final grade. Both grade for submission and grade for assessment can be overridden by teacher. Final grade is always the sum of them. All grades are stored as of 0-100.
        Schema::create('workshop_submissions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('workshopid')->comment('the id of the workshop instance');
            $table->tinyInteger('example')->nullable()->default(0)->comment('Is this submission an example from teacher');
            $table->unsignedBigInteger('authorid')->comment('The author of the submission');
            $table->integer('timecreated')->comment('Timestamp when the work was submitted for the first time');
            $table->integer('timemodified')->comment('Timestamp when the submission has been updated');
            $table->string('title', 255)->comment('The submission title');
            $table->text('content')->nullable()->comment('Submission text');
            $table->tinyInteger('contentformat')->default(0)->comment('The format of submission text');
            $table->tinyInteger('contenttrust')->default(0)->comment('The trust mode of the data');
            $table->tinyInteger('attachment')->nullable()->default(0)->comment('Used by File API file_postupdate_standard_filemanager');
            $table->decimal('grade', 10, 5)->nullable()->comment('Aggregated grade for the submission. The grade is a decimal number from interval 0..100. If NULL then the grade for submission has not been aggregated yet.');
            $table->decimal('gradeover', 10, 5)->nullable()->comment('Grade for the submission manually overridden by a teacher. Grade is always from interval 0..100. If NULL then the grade is not overriden.');
            $table->unsignedBigInteger('gradeoverby')->nullable()->comment('The id of the user who has overridden the grade for submission.');
            $table->text('feedbackauthor')->nullable()->comment('Teacher comment/feedback for the author of the submission, for example describing the reasons for the grade overriding');
            $table->tinyInteger('feedbackauthorformat')->nullable()->default(0);
            $table->integer('timegraded')->nullable()->comment('The timestamp when grade or gradeover was recently modified');
            $table->tinyInteger('published')->nullable()->default(0)->comment('Shall the submission be available to other when the workshop is closed');
            $table->tinyInteger('late')->default(0)->comment('Has this submission been submitted after the deadline or during the assessment phase?');

            // Foreign Keys
            $table->foreign('workshopid')->references('id')->on('workshop');
            $table->foreign('gradeoverby')->references('id')->on('users');
            $table->foreign('authorid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_submissions');
    }
};
