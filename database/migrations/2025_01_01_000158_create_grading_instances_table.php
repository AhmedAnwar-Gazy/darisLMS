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
        // Grading form instance is an assessment record for one gradable item assessed by one rater
        Schema::create('grading_instances', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('definitionid')->comment('The ID of the form definition this is instance of');
            $table->unsignedBigInteger('raterid')->comment('The ID of the user who did the assessment');
            $table->integer('itemid')->nullable()->comment('This identifies the graded item within the grabable area');
            $table->decimal('rawgrade', 10, 5)->nullable()->comment('The raw normalized grade 0.00000 - 100.00000 as a result of the most recent assessment');
            $table->integer('status')->default(0)->comment('The status of the assessment. By default the instance is under-assessment state');
            $table->text('feedback')->nullable()->comment('Overall feedback from the rater for the author of the graded item');
            $table->tinyInteger('feedbackformat')->nullable()->comment('The format of the feedback field');
            $table->integer('timemodified')->comment('The timestamp of when the assessment was most recently modified');

            // Foreign Keys
            $table->foreign('definitionid')->references('id')->on('grading_definitions');
            $table->foreign('raterid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grading_instances');
    }
};
