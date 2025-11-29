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
        // Grading data for forum instances
        Schema::create('forum_grades', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('forum')->comment('The ID of the forum that this grade relates to');
            $table->integer('itemnumber')->comment('The grade itemnumber');
            $table->integer('userid')->comment('The user who was graded');
            $table->decimal('grade', 10, 5)->nullable()->comment('The numerical grade for this user\'s forum assessment. Can be determined by scales/advancedgradingforms etc but will always be converted back to a floating point number.');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Indexes
            $table->index(['userid'], 'userid');

            // Unique Indexes
            $table->unique(['forum', 'itemnumber', 'userid'], 'forumusergrade');

            // Foreign Keys
            $table->foreign('forum')->references('id')->on('forum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_grades');
    }
};
