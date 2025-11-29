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
        // This table keeps information about gradeable items (ie columns). If an activity (eg an assignment or quiz) has multiple grade_items associated with it (eg several outcomes or numerical grades), then there will be a corresponding multiple number of rows in this table.
        Schema::create('grade_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('courseid')->nullable()->comment('The course this item is part of');
            $table->unsignedBigInteger('categoryid')->nullable()->comment('(optional) the category group this item belongs to');
            $table->string('itemname', 255)->nullable()->comment('The name of this item (pushed in by the module)');
            $table->string('itemtype', 30)->comment('\'mod\', \'blocks\', \'import\', \'calculated\' etc');
            $table->string('itemmodule', 30)->nullable()->comment('\'forum\', \'quiz\', \'csv\', etc');
            $table->integer('iteminstance')->nullable()->comment('id of the item module');
            $table->integer('itemnumber')->nullable()->comment('Can be used to distinguish multiple grades for an activity');
            $table->text('iteminfo')->nullable()->comment('Info and notes about this item XXX');
            $table->string('idnumber', 255)->nullable()->comment('Arbitrary idnumber provided by the module responsible');
            $table->text('calculation')->nullable()->comment('Formula describing how to derive this grade from other items, referring to them using giXXX where XXX is grade item id ... eg something like: =sin(square([#gi20#])) + [#gi30#]');
            $table->smallInteger('gradetype')->default(1)->comment('0 = none, 1 = value, 2 = scale, 3 = text');
            $table->decimal('grademax', 10, 5)->default(100)->comment('What is the maximum allowable grade?');
            $table->decimal('grademin', 10, 5)->default(0)->comment('What is the minimum allowable grade?');
            $table->unsignedBigInteger('scaleid')->nullable()->comment('If this grade is based on a scale, which one is it?');
            $table->unsignedBigInteger('outcomeid')->nullable()->comment('If this grade is related to an outcome, which one is it?');
            $table->decimal('gradepass', 10, 5)->default(0)->comment('What grade is needed to pass? grademin &lt; gradepass &lt;= grademax');
            $table->decimal('multfactor', 10, 5)->default(1.0)->comment('Multiply all grades by this');
            $table->decimal('plusfactor', 10, 5)->default(0)->comment('Add this to all grades');
            $table->decimal('aggregationcoef', 10, 5)->default(0)->comment('Aggregation coefficient used for category weights or other aggregation types');
            $table->decimal('aggregationcoef2', 10, 5)->default(0)->comment('Aggregation coefficient used for weights in aggregation types with both extra credit and weight');
            $table->integer('sortorder')->default(0)->comment('Sorting order of the columns');
            $table->integer('display')->default(0)->comment('Display as real grades, percentages (in reference to the minimum and maximum grades) or letters (A, B, C etc..), or course default (0)');
            $table->boolean('decimals')->nullable()->comment('Also known as precision, the number of digits after the decimal point symbol.');
            $table->integer('hidden')->default(0)->comment('1 is hidden, &gt; 1 is a date to hide until (prevents viewing)');
            $table->integer('locked')->default(0)->comment('1 is locked, &gt; 1 is a date to lock until (prevents update)');
            $table->integer('locktime')->default(0)->comment('lock all final grades after this date');
            $table->integer('needsupdate')->default(0)->comment('If this flag is set, then the whole column will be recalculated');
            $table->boolean('weightoverride')->default(0);
            $table->integer('timecreated')->nullable()->comment('The first time this grade_item was created');
            $table->integer('timemodified')->nullable()->comment('The last time this grade_item was modified');

            // Indexes
            $table->index(['locked', 'locktime'], 'locked-locktime');
            $table->index(['itemtype', 'needsupdate'], 'itemtype-needsupdate');
            $table->index(['gradetype'], 'gradetype');
            $table->index(['idnumber', 'courseid'], 'idnumber-courseid');
            $table->index(['itemtype', 'itemmodule', 'iteminstance', 'courseid'], 'itemtype-mod-inst-course');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('categoryid')->references('id')->on('grade_categories');
            $table->foreign('scaleid')->references('id')->on('scale');
            $table->foreign('outcomeid')->references('id')->on('grade_outcomes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_items');
    }
};
