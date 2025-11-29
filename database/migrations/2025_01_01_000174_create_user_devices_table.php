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
        // This table stores user\'s mobile devices information in order to send PUSH notifications
        Schema::create('user_devices', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0);
            $table->string('appid', 128)->comment('the app id, usually something like com.moodle.moodlemobile');
            $table->string('name', 32)->comment('the device name, occam or iPhone etc..');
            $table->string('model', 32)->comment('the device model, Nexus 4 or iPad 1,1');
            $table->string('platform', 32)->comment('the device platform, Android or iOS etc');
            $table->string('version', 32)->comment('The device version, 6.1.2, 4.2.2 etc..');
            $table->string('pushid', 255)->comment('the device PUSH token/key/identifier/registration id');
            $table->string('uuid', 255)->comment('The device vendor UUID');
            $table->text('publickey')->nullable()->comment('The app generated public key');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Indexes
            $table->index(['uuid', 'userid'], 'uuid-userid');

            // Unique Indexes
            $table->unique(['pushid', 'userid'], 'pushid-userid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_devices');
    }
};
