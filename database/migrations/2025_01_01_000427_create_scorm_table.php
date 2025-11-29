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
        // each table is one SCORM module and its configuration
        Schema::create('scorm', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->string('scormtype', 50)->default('local')->comment('local, external or repository');
            $table->string('reference', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0);
            $table->string('version', 9);
            $table->string('maxgrade')->default(0);
            $table->tinyInteger('grademethod')->default(0);
            $table->integer('whatgrade')->default(0);
            $table->integer('maxattempt')->default(1);
            $table->boolean('forcecompleted')->default(0);
            $table->boolean('forcenewattempt')->default(0);
            $table->boolean('lastattemptlock')->default(0);
            $table->boolean('masteryoverride')->default(1);
            $table->boolean('displayattemptstatus')->default(1);
            $table->boolean('displaycoursestructure')->default(0);
            $table->boolean('updatefreq')->default(0)->comment('Define when the package must be automatically update');
            $table->string('sha1hash', 40)->nullable()->comment('package content or ext path hash');
            $table->string('md5hash', 32)->comment('MD5 Hash of package file');
            $table->integer('revision')->default(0)->comment('revison number');
            $table->integer('launch')->default(0);
            $table->boolean('skipview')->default(1);
            $table->boolean('hidebrowse')->default(0);
            $table->boolean('hidetoc')->default(0);
            $table->boolean('nav')->default(1);
            $table->integer('navpositionleft')->nullable()->default(-100);
            $table->integer('navpositiontop')->nullable()->default(-100);
            $table->boolean('auto')->default(0);
            $table->boolean('popup')->default(0);
            $table->string('options', 255);
            $table->integer('width')->default(100);
            $table->integer('height')->default(600);
            $table->integer('timeopen')->default(0);
            $table->integer('timeclose')->default(0);
            $table->integer('timemodified')->default(0);
            $table->boolean('completionstatusrequired')->nullable();
            $table->integer('completionscorerequired')->nullable();
            $table->boolean('completionstatusallscos')->nullable();
            $table->boolean('autocommit')->default(0);

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm');
    }
};
