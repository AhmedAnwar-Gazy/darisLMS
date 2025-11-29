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
        // each record is one folder resource
        Schema::create('folder', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->integer('revision')->default(0)->comment('incremented when after each file changes, solves browser caching issues');
            $table->integer('timemodified')->default(0);
            $table->smallInteger('display')->default(0)->comment('Display type of folder contents - on a separate page or inline');
            $table->boolean('showexpanded')->default(1)->comment('1 = expanded, 0 = collapsed for sub-folders');
            $table->boolean('showdownloadfolder')->default(1)->comment('1 = show download folder button');
            $table->boolean('forcedownload')->default(1)->comment('1 = force download of individual files');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folder');
    }
};
