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
        // How the reviewers filled-up the grading forms, given grades and comments
        Schema::create('workshop_grades', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assessmentid')->comment('Part of which assessment this grade is of');
            $table->string('strategy', 30);
            $table->integer('dimensionid')->comment('Foreign key. References dimension id in one of the grading strategy tables.');
            $table->decimal('grade', 10, 5)->nullable()->comment('Given grade in the referenced assessment dimension.');
            $table->text('peercomment')->nullable()->comment('Reviewer\'s comment to the grade value.');
            $table->tinyInteger('peercommentformat')->nullable()->default(0)->comment('The format of peercomment field');

            // Unique Indexes
            $table->unique(['assessmentid', 'strategy', 'dimensionid'], 'formfield_uk');

            // Foreign Keys
            $table->foreign('assessmentid')->references('id')->on('workshop_assessments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_grades');
    }
};
