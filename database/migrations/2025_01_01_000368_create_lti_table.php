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
        // This table contains Basic LTI activities instances
        Schema::create('lti', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0)->comment('Course basiclti activity belongs to');
            $table->string('name', 255)->comment('name field for moodle instances');
            $table->text('intro')->nullable()->comment('General introduction of the basiclti activity');
            $table->smallInteger('introformat')->nullable()->default(0)->comment('Format of the intro field (MOODLE, HTML, MARKDOWN...)');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->integer('typeid')->nullable()->comment('Basic LTI type');
            $table->text('toolurl')->comment('Remote tool url');
            $table->text('securetoolurl')->nullable();
            $table->boolean('instructorchoicesendname')->nullable()->comment('Send user\'s name');
            $table->boolean('instructorchoicesendemailaddr')->nullable()->comment('Send user\'s email');
            $table->boolean('instructorchoiceallowroster')->nullable()->comment('Allow the roster to be retrieved');
            $table->boolean('instructorchoiceallowsetting')->nullable()->comment('Allow a tool to store a setting');
            $table->text('instructorcustomparameters')->nullable()->comment('Additional custom parameters provided by the instructor');
            $table->boolean('instructorchoiceacceptgrades')->nullable()->comment('Accept grades from tool');
            $table->integer('grade')->default(100)->comment('Grade scale');
            $table->tinyInteger('launchcontainer')->default(1)->comment('Launch external tool in a pop-up');
            $table->string('resourcekey', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->boolean('debuglaunch')->default(0)->comment('Enable the debug-style launch which pauses before auto-submit');
            $table->boolean('showtitlelaunch')->default(0);
            $table->boolean('showdescriptionlaunch')->default(0);
            $table->string('servicesalt', 40)->nullable();
            $table->text('icon')->nullable();
            $table->text('secureicon')->nullable();

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti');
    }
};
