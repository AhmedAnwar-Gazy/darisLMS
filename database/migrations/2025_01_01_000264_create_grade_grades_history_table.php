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
        // History table
        Schema::create('grade_grades_history', function (Blueprint $table) {
            $table->id('id');
            $table->integer('action')->default(0)->comment('created/modified/deleted constants');
            $table->unsignedBigInteger('oldid');
            $table->string('source', 255)->nullable()->comment('What caused the modification? manual/module/import/...');
            $table->integer('timemodified')->nullable()->comment('The last time this grade_item was modified');
            $table->unsignedBigInteger('loggeduser')->nullable()->comment('the userid of the person who last modified this outcome');
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

            // Indexes
            $table->index(['action'], 'action');
            $table->index(['timemodified'], 'timemodified');
            $table->index(['userid', 'itemid', 'timemodified'], 'userid-itemid-timemodified');

            // Foreign Keys
            $table->foreign('oldid')->references('id')->on('grade_grades');
            $table->foreign('itemid')->references('id')->on('grade_items');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('rawscaleid')->references('id')->on('scale');
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('loggeduser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_grades_history');
    }
};
