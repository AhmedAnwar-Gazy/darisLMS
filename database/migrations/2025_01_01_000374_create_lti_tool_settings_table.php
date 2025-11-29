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
        // LTI tool setting values
        Schema::create('lti_tool_settings', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('toolproxyid')->comment('Primary key of related tool proxy');
            $table->unsignedBigInteger('typeid')->nullable();
            $table->unsignedBigInteger('course')->nullable()->comment('Primary key of course (null for system-wide settings)');
            $table->unsignedBigInteger('coursemoduleid')->nullable()->comment('Primary key of course module - tool link added to course (null for system-wide and context-wide settings)');
            $table->text('settings')->comment('Setting values as JSON');
            $table->integer('timecreated')->comment('Date/time at which the record was created');
            $table->integer('timemodified')->comment('Date/time at which the record was last modified');

            // Foreign Keys
            $table->foreign('toolproxyid')->references('id')->on('lti_tool_proxies');
            $table->foreign('typeid')->references('id')->on('lti_types');
            $table->foreign('course')->references('id')->on('course');
            $table->foreign('coursemoduleid')->references('id')->on('lti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_tool_settings');
    }
};
