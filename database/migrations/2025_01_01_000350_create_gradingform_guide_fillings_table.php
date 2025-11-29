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
        // Stores the data of how the guide is filled by a particular rater
        Schema::create('gradingform_guide_fillings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('instanceid')->comment('The ID of the grading form instance');
            $table->unsignedBigInteger('criterionid')->comment('The ID of the criterion (row) in the guide');
            $table->text('remark')->nullable()->comment('Side note feedback regarding this particular criterion');
            $table->tinyInteger('remarkformat')->nullable()->comment('The format of the remark field');
            $table->decimal('score', 10, 5)->comment('The score assigned');

            // Unique Indexes
            $table->unique(['instanceid', 'criterionid'], 'uq_instance_criterion');

            // Foreign Keys
            $table->foreign('instanceid')->references('id')->on('grading_instances');
            $table->foreign('criterionid')->references('id')->on('gradingform_guide_criteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingform_guide_fillings');
    }
};
