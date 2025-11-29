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
        // Table to store user subscriptions to various rules
        Schema::create('tool_monitor_subscriptions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->comment('Course id of the subscription');
            $table->unsignedBigInteger('ruleid')->comment('Rule id');
            $table->integer('cmid')->comment('Course module id');
            $table->integer('userid')->comment('User id of the subscriber');
            $table->integer('timecreated')->comment('Timestamp of when this subscription was created');
            $table->integer('lastnotificationsent')->default(0)->comment('Timestamp of the time when a notification was last sent for this subscription.');
            $table->integer('inactivedate')->default(0);

            // Indexes
            $table->index(['courseid', 'userid'], 'courseanduser');

            // Foreign Keys
            $table->foreign('ruleid')->references('id')->on('tool_monitor_rules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_monitor_subscriptions');
    }
};
