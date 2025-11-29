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
        // Table to store history of message notifications sent
        Schema::create('tool_monitor_history', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('sid')->comment('Subscription id');
            $table->integer('userid')->comment('User to whom this notification was sent');
            $table->integer('timesent')->comment('Timestamp of when the message was sent.');

            // Unique Indexes
            $table->unique(['sid', 'userid', 'timesent'], 'sid_userid_timesent');

            // Foreign Keys
            $table->foreign('sid')->references('id')->on('tool_monitor_subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_monitor_history');
    }
};
