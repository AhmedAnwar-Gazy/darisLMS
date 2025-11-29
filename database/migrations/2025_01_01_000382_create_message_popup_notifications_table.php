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
        // List of notifications to display in the message output popup
        Schema::create('message_popup_notifications', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('notificationid');

            // Foreign Keys
            $table->foreign('notificationid')->references('id')->on('notifications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_popup_notifications');
    }
};
