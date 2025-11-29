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
        // This table keeps information about the module instances and their settings
        Schema::create('workshop', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('course')->comment('ID of the parent course');
            $table->string('name', 255)->comment('Name of the activity');
            $table->text('intro')->nullable()->comment('The introduction or description of the activity');
            $table->tinyInteger('introformat')->default(0)->comment('The format of the intro field');
            $table->text('instructauthors')->nullable()->comment('Instructions for the submission phase');
            $table->tinyInteger('instructauthorsformat')->default(0);
            $table->text('instructreviewers')->nullable()->comment('Instructions for the assessment phase');
            $table->tinyInteger('instructreviewersformat')->default(0);
            $table->integer('timemodified')->comment('The timestamp when the module was modified');
            $table->tinyInteger('phase')->nullable()->default(0)->comment('The current phase of workshop (0 = not available, 1 = submission, 2 = assessment, 3 = closed)');
            $table->tinyInteger('useexamples')->nullable()->default(0)->comment('optional feature: students practise evaluating on example submissions from teacher');
            $table->tinyInteger('usepeerassessment')->nullable()->default(0)->comment('optional feature: students perform peer assessment of others\' work');
            $table->tinyInteger('useselfassessment')->nullable()->default(0)->comment('optional feature: students perform self assessment of their own work');
            $table->decimal('grade', 10, 5)->nullable()->default(80)->comment('The maximum grade for submission');
            $table->decimal('gradinggrade', 10, 5)->nullable()->default(20)->comment('The maximum grade for assessment');
            $table->string('strategy', 30)->comment('The type of the current grading strategy used in this workshop');
            $table->string('evaluation', 30)->comment('The recently used grading evaluation method');
            $table->tinyInteger('gradedecimals')->nullable()->default(0)->comment('Number of digits that should be shown after the decimal point when displaying grades');
            $table->boolean('submissiontypetext')->default(1)->comment('Can students enter text for their submissions? 0 for no, 1 for optional, 2 for required.');
            $table->boolean('submissiontypefile')->default(1)->comment('Can students attach files for their submissions? 0 for no, 1 for optional, 2 for required.');
            $table->tinyInteger('nattachments')->nullable()->default(1)->comment('Maximum number of submission attachments');
            $table->string('submissionfiletypes', 255)->nullable()->comment('comma separated list of file extensions');
            $table->tinyInteger('latesubmissions')->nullable()->default(0)->comment('Allow submitting the work after the deadline');
            $table->integer('maxbytes')->nullable()->default(100000)->comment('Maximum size of the one attached file');
            $table->tinyInteger('examplesmode')->nullable()->default(0)->comment('0 = example assessments are voluntary, 1 = examples must be assessed before submission, 2 = examples are available after own submission and must be assessed before peer/self assessment phase');
            $table->integer('submissionstart')->nullable()->default(0)->comment('0 = will be started manually, greater than 0 the timestamp of the start of the submission phase');
            $table->integer('submissionend')->nullable()->default(0)->comment('0 = will be closed manually, greater than 0 the timestamp of the end of the submission phase');
            $table->integer('assessmentstart')->nullable()->default(0)->comment('0 = will be started manually, greater than 0 the timestamp of the start of the assessment phase');
            $table->integer('assessmentend')->nullable()->default(0)->comment('0 = will be closed manually, greater than 0 the timestamp of the end of the assessment phase');
            $table->tinyInteger('phaseswitchassessment')->default(0)->comment('Automatically switch to the assessment phase after the submissions deadline');
            $table->text('conclusion')->nullable()->comment('A text to be displayed at the end of the workshop.');
            $table->tinyInteger('conclusionformat')->default(1)->comment('The format of the conclusion field content.');
            $table->tinyInteger('overallfeedbackmode')->nullable()->default(1)->comment('Mode of the overall feedback support.');
            $table->tinyInteger('overallfeedbackfiles')->nullable()->default(0)->comment('Number of allowed attachments to the overall feedback.');
            $table->string('overallfeedbackfiletypes', 255)->nullable()->comment('comma separated list of file extensions');
            $table->integer('overallfeedbackmaxbytes')->nullable()->default(100000)->comment('Maximum size of one file attached to the overall feedback.');

            // Foreign Keys
            $table->foreign('course')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop');
    }
};
