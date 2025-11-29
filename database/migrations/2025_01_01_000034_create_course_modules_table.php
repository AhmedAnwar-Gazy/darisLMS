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
        // course_modules table retrofitted from MySQL
        Schema::create('course_modules', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->integer('module')->default(0);
            $table->integer('instance')->default(0);
            $table->integer('section')->default(0);
            $table->string('idnumber', 100)->nullable()->comment('customizable idnumber');
            $table->integer('added')->default(0);
            $table->smallInteger('score')->default(0);
            $table->smallInteger('indent')->default(0);
            $table->boolean('visible')->default(1);
            $table->boolean('visibleoncoursepage')->default(1)->comment('If stealth visibility is allowed for the course, this controls whether activity is visible on course page');
            $table->boolean('visibleold')->default(1);
            $table->smallInteger('groupmode')->default(0);
            $table->unsignedBigInteger('groupingid')->default(0);
            $table->boolean('completion')->default(0)->comment('Whether the completion-tracking facilities are enabled for this activity. 0 = not enabled (database default) 1 = manual tracking, user can tick this activity off (UI default for most activity types) 2 = automatic tracking, system should mark completion according to rules specified in course_moduleS_completion');
            $table->integer('completiongradeitemnumber')->nullable()->comment('Grade-item number used to track automatic completion, if applicable.');
            $table->boolean('completionview')->default(0)->comment('Controls whether a page view is part of the automatic completion requirements for this activity. 0 = view not required 1 = view required');
            $table->integer('completionexpected')->default(0)->comment('Date at which students are expected to complete this activity. This field is used when displaying student progress.');
            $table->boolean('completionpassgrade')->default(0)->comment('Enable completion check on passing grade.');
            $table->boolean('showdescription')->default(0)->comment('Some module types support a \'description\' which shows within the module pages. This option controls whether it also displays on the course main page. 0 = does not display (default), 1 = displays');
            $table->text('availability')->nullable()->comment('Availability restrictions for viewing this activity, in JSON format. Null if no restrictions.');
            $table->boolean('deletioninprogress')->default(0);
            $table->boolean('downloadcontent')->nullable()->default(1)->comment('Whether the ability to download course module content is enabled for this activity');
            $table->string('lang', 30)->nullable()->comment('Forced language for this activity. Null or \'\' means \'Do not force\'. Otherwise a Moodle lang pack name like \'fr\' or \'en_us\'.');

            // Indexes
            $table->index(['visible'], 'visible');
            $table->index(['course'], 'course');
            $table->index(['module'], 'module');
            $table->index(['instance'], 'instance');
            $table->index(['idnumber', 'course'], 'idnumber-course');

            // Foreign Keys
            $table->foreign('groupingid')->references('id')->on('groupings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_modules');
    }
};
