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
        // Standard log table
        Schema::create('logstore_standard_log', function (Blueprint $table) {
            $table->id('id');
            $table->string('eventname', 255);
            $table->string('component', 100);
            $table->string('action', 100);
            $table->string('target', 100);
            $table->string('objecttable', 50)->nullable();
            $table->integer('objectid')->nullable();
            $table->string('crud', 1);
            $table->boolean('edulevel');
            $table->unsignedBigInteger('contextid');
            $table->integer('contextlevel');
            $table->integer('contextinstanceid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('courseid')->nullable();
            $table->unsignedBigInteger('relateduserid')->nullable();
            $table->boolean('anonymous')->default(0)->comment('Was this event anonymous at the time of triggering?');
            $table->text('other')->nullable();
            $table->integer('timecreated');
            $table->string('origin', 10)->nullable()->comment('cli, cron, ws, etc.');
            $table->string('ip', 45)->nullable()->comment('IP address');
            $table->unsignedBigInteger('realuserid')->nullable()->comment('real user id when logged-in-as');

            // Indexes
            $table->index(['timecreated'], 'timecreated');
            $table->index(['courseid', 'anonymous', 'timecreated'], 'course-time');
            $table->index(['userid', 'contextlevel', 'contextinstanceid', 'crud', 'edulevel', 'timecreated'], 'user-module');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('realuserid')->references('id')->on('users');
            $table->foreign('relateduserid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logstore_standard_log');
    }
};
