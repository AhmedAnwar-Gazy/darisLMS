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
        // Stores comments added to pdfs
        Schema::create('assignfeedback_editpdf_cmnt', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('gradeid')->default(0);
            $table->integer('x')->nullable()->default(0)->comment('x-position of the top-left corner of the comment (in pixels - image resolution is set to 100 pixels per inch)');
            $table->integer('y')->nullable()->default(0)->comment('y-position of the top-left corner of the comment (in pixels - image resolution is set to 100 pixels per inch)');
            $table->integer('width')->nullable()->default(120)->comment('width, in pixels, of the comment box');
            $table->text('rawtext')->nullable()->comment('Raw text of the comment');
            $table->integer('pageno')->default(0)->comment('The page in the PDF that this comment appears on');
            $table->string('colour', 10)->nullable()->default('black')->comment('Can be red, yellow, green, blue, white, black');
            $table->tinyInteger('draft')->default(1)->comment('Is this a draft comment?');

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
        Schema::dropIfExists('assignfeedback_editpdf_cmnt');
    }
};
