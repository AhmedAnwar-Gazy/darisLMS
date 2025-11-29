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
        // Defines lesson
        Schema::create('lesson', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->tinyInteger('practice')->default(0);
            $table->tinyInteger('modattempts')->default(0);
            $table->tinyInteger('usepassword')->default(0);
            $table->string('password', 32);
            $table->integer('dependency')->default(0);
            $table->text('conditions');
            $table->integer('grade')->default(0);
            $table->tinyInteger('custom')->default(0);
            $table->tinyInteger('ongoing')->default(0);
            $table->tinyInteger('usemaxgrade')->default(0);
            $table->tinyInteger('maxanswers')->default(4);
            $table->tinyInteger('maxattempts')->default(5);
            $table->tinyInteger('review')->default(0);
            $table->tinyInteger('nextpagedefault')->default(0);
            $table->tinyInteger('feedback')->default(1);
            $table->tinyInteger('minquestions')->default(0);
            $table->tinyInteger('maxpages')->default(0);
            $table->integer('timelimit')->default(0);
            $table->tinyInteger('retake')->default(1);
            $table->integer('activitylink')->default(0);
            $table->string('mediafile', 255)->comment('Local file path or full external URL');
            $table->integer('mediaheight')->default(100);
            $table->integer('mediawidth')->default(650);
            $table->tinyInteger('mediaclose')->default(0);
            $table->tinyInteger('slideshow')->default(0);
            $table->integer('width')->default(640);
            $table->integer('height')->default(480);
            $table->string('bgcolor', 7)->default('#FFFFFF');
            $table->tinyInteger('displayleft')->default(0);
            $table->tinyInteger('displayleftif')->default(0);
            $table->tinyInteger('progressbar')->default(0);
            $table->integer('available')->default(0);
            $table->integer('deadline')->default(0);
            $table->integer('timemodified')->default(0);
            $table->boolean('completionendreached')->nullable()->default(0);
            $table->bigInteger('completiontimespent')->nullable()->default(0);
            $table->boolean('allowofflineattempts')->nullable()->default(0)->comment('Whether to allow the lesson to be attempted offline in the mobile app');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson');
    }
};
