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
        // grade_grades  This table keeps individual grades for each user and each item, exactly as imported or submitted by modules. The rawgrademax/min and rawscaleid are stored here to record the values at the time the grade was stored, because teachers might change this for an activity! All the results are normalised/resampled for the final grade value.
        Schema::create('grade_grades', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('itemid')->comment('The item this grade belongs to');
            $table->unsignedBigInteger('userid')->comment('The user who this grade is for');
            $table->decimal('rawgrade', 10, 5)->nullable()->comment('If the grade is a float value (or has been converted to one)');
            $table->decimal('rawgrademax', 10, 5)->default(100)->comment('The maximum allowable grade when this was created');
            $table->decimal('rawgrademin', 10, 5)->default(0)->comment('The minimum allowable grade when this was created');
            $table->unsignedBigInteger('rawscaleid')->nullable()->comment('If this grade is based on a scale, which one was it?');
            $table->unsignedBigInteger('usermodified')->nullable()->comment('the userid of the person who last modified this grade');
            $table->decimal('finalgrade', 10, 5)->nullable()->comment('The final grade (cached) after all calculations are made');
            $table->integer('hidden')->default(0)->comment('show 0, hide 1 or hide until date');
            $table->integer('locked')->default(0)->comment('not locked 0, locked from date');
            $table->integer('locktime')->default(0)->comment('automatic locking of final grade, 0 means none, date otherwise');
            $table->integer('exported')->default(0)->comment('date of last grade export, 0 if none');
            $table->integer('overridden')->default(0)->comment('indicates grade overridden from gradebook, 0 means none, date means overridden');
            $table->integer('excluded')->default(0)->comment('grade excluded from aggregation functions, date means when excluded');
            $table->text('feedback')->nullable()->comment('grading feedback');
            $table->integer('feedbackformat')->default(0)->comment('format of feedback text');
            $table->text('information')->nullable()->comment('optiona information');
            $table->integer('informationformat')->default(0)->comment('format of information text');
            $table->integer('timecreated')->nullable()->comment('the time this grade was first created');
            $table->integer('timemodified')->nullable()->comment('the time this grade was last modified');
            $table->string('aggregationstatus', 10)->default('unknown')->comment('One of several values describing how this grade_grade was used when calculating the aggregation. Possible values are "unknown", "dropped", "novalue", "used"');
            $table->decimal('aggregationweight', 10, 5)->nullable()->comment('If the aggregationstatus == \'included\', then this is the percent this item contributed to the aggregation.');

            // Indexes
            $table->index(['locked', 'locktime'], 'locked-locktime');

            // Unique Indexes
            $table->unique(['userid', 'itemid'], 'userid-itemid');

            // Foreign Keys
            $table->foreign('itemid')->references('id')->on('grade_items');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('rawscaleid')->references('id')->on('scale');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_grades');
    }
};
