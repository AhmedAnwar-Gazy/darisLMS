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
        // Stores the data of how the rubric is filled by a particular rater
        Schema::create('gradingform_rubric_fillings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('instanceid')->comment('The ID of the grading form instance');
            $table->unsignedBigInteger('criterionid')->comment('The ID of the criterion (row) in the rubric');
            $table->integer('levelid')->nullable()->comment('If a particular level was selected during the assessment, its ID is stored here');
            $table->text('remark')->nullable()->comment('Side note feedback regarding this particular criterion');
            $table->tinyInteger('remarkformat')->nullable()->comment('The format of the remark field');

            // Indexes
            $table->index(['levelid'], 'ix_levelid');

            // Unique Indexes
            $table->unique(['instanceid', 'criterionid'], 'uq_instance_criterion');

            // Foreign Keys
            $table->foreign('instanceid')->references('id')->on('grading_instances');
            $table->foreign('criterionid')->references('id')->on('gradingform_rubric_criteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingform_rubric_fillings');
    }
};
