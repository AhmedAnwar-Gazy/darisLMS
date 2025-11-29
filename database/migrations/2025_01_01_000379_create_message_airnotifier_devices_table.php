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
        // Store information about the devices registered in Airnotifier for PUSH notifications
        Schema::create('message_airnotifier_devices', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userdeviceid')->comment('The user device id in the user_devices table');
            $table->boolean('enable')->default(1)->comment('The user can enable/disable his devices');

            // Unique Indexes
            $table->unique(['userdeviceid'], 'userdeviceid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_airnotifier_devices');
    }
};
