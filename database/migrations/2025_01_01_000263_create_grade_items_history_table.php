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
        // History of grade_items
        Schema::create('grade_items_history', function (Blueprint $table) {
            $table->id('id');
            $table->integer('action')->default(0)->comment('created/modified/deleted constants');
            $table->unsignedBigInteger('oldid');
            $table->string('source', 255)->nullable()->comment('What caused the modification? manual/module/import/...');
            $table->integer('timemodified')->nullable()->comment('The last time this grade_item was modified');
            $table->unsignedBigInteger('loggeduser')->nullable()->comment('the userid of the person who last modified this outcome');
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
            $table->decimal('aggregationcoef2', 10, 5)->default(0)->comment('Aggregation coefficient used for category weights or other aggregation types');
            $table->integer('sortorder')->default(0)->comment('Sorting order of the columns');
            $table->integer('hidden')->default(0)->comment('1 is hidden, &gt; 1 is a date to hide until (prevents viewing)');
            $table->integer('locked')->default(0)->comment('1 is locked, &gt; 1 is a date to lock until (prevents update)');
            $table->integer('locktime')->default(0)->comment('lock all final grades after this date');
            $table->integer('needsupdate')->default(0)->comment('If this flag is set, then the whole column will be recalculated');
            $table->integer('display')->default(0);
            $table->boolean('decimals')->nullable();
            $table->boolean('weightoverride')->default(0);

            // Indexes
            $table->index(['action'], 'action');
            $table->index(['timemodified'], 'timemodified');

            // Foreign Keys
            $table->foreign('oldid')->references('id')->on('grade_items');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('categoryid')->references('id')->on('grade_categories');
            $table->foreign('scaleid')->references('id')->on('scale');
            $table->foreign('outcomeid')->references('id')->on('grade_outcomes');
            $table->foreign('loggeduser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_items_history');
    }
};
