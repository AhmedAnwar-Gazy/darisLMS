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
        // Grading information about a single assignment submission.
        Schema::create('assign_grades', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('timecreated')->default(0)->comment('The time the assignment submission was first modified by a grader.');
            $table->integer('timemodified')->default(0)->comment('The most recent modification time for the assignment submission by a grader.');
            $table->integer('grader')->default(0);
            $table->decimal('grade', 10, 5)->nullable()->default(0)->comment('The numerical grade for this assignment submission. Can be determined by scales/advancedgradingforms etc but will always be converted back to a floating point number.');
            $table->integer('attemptnumber')->default(0)->comment('The attempt number that this grade relates to');

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['attemptnumber'], 'attemptnumber');

            // Unique Indexes
            $table->unique(['assignment', 'userid', 'attemptnumber'], 'uniqueattemptgrade');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_grades');
    }
};
