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
        // stores annotations added to pdfs submitted by students
        Schema::create('assignfeedback_editpdf_annot', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('gradeid')->default(0);
            $table->integer('pageno')->default(0)->comment('The page in the PDF that this annotation appears on');
            $table->integer('x')->nullable()->default(0)->comment('x-position of the start of the annotation (in pixels - image resolution is set to 100 pixels per inch)');
            $table->integer('y')->nullable()->default(0)->comment('y-position of the start of the annotation (in pixels - image resolution is set to 100 pixels per inch)');
            $table->integer('endx')->nullable()->default(0)->comment('x-position of the end of the annotation');
            $table->integer('endy')->nullable()->default(0)->comment('y-position of the end of the annotation');
            $table->text('path')->nullable()->comment('SVG path describing the freehand line');
            $table->string('type', 10)->nullable()->default('line')->comment('line, oval, rect, etc.');
            $table->string('colour', 10)->nullable()->default('black')->comment('Can be red, yellow, green, blue, white, black');
            $table->tinyInteger('draft')->default(1)->comment('Is this a draft annotation?');

            // Indexes
            $table->index(['gradeid', 'pageno'], 'gradeid_pageno');

            // Foreign Keys
            $table->foreign('gradeid')->references('id')->on('assign_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignfeedback_editpdf_annot');
    }
};
