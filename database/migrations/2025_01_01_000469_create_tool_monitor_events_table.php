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
        // A table that keeps a log of events related to subscriptions
        Schema::create('tool_monitor_events', function (Blueprint $table) {
            $table->id('id');
            $table->string('eventname', 254)->comment('Event name');
            $table->unsignedBigInteger('contextid')->comment('Context id');
            $table->integer('contextlevel')->comment('Context level');
            $table->unsignedBigInteger('contextinstanceid')->comment('Context instance id');
            $table->string('link', 254)->comment('Link to the event location');
            $table->unsignedBigInteger('courseid')->comment('course id');
            $table->integer('timecreated')->comment('Time created');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('contextid')->references('id')->on('context');
            // Note: contextinstanceid references context.instanceid which is polymorphic - cannot enforce FK
            // $table->foreign('contextinstanceid')->references('instanceid')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_monitor_events');
    }
};
