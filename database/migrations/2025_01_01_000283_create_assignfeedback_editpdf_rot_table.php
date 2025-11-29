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
        // Stores rotation information of a page.
        Schema::create('assignfeedback_editpdf_rot', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('gradeid')->default(0);
            $table->integer('pageno')->default(0)->comment('Page number');
            $table->text('pathnamehash')->comment('File path hash of the rotated page');
            $table->boolean('isrotated')->default(0)->comment('Whether the page is rotated or not');
            $table->integer('degree')->default(0)->comment('Rotation degree');

            // Unique Indexes
            $table->unique(['gradeid', 'pageno'], 'gradeid_pageno');

            // Foreign Keys
            $table->foreign('gradeid')->references('id')->on('assign_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignfeedback_editpdf_rot');
    }
};
