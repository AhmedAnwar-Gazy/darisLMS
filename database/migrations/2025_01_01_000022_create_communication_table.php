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
        // Communication records
        Schema::create('communication', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->comment('The id of the context that this communication instance relates to');
            $table->integer('instanceid')->comment('ID of the instance where the communication is a part of');
            $table->string('component', 100)->comment('Component of the instance where the communication room is a part of');
            $table->string('instancetype', 100)->comment('The type of the instance for the given component');
            $table->string('provider', 100)->comment('Name of the selected communication provider');
            $table->string('roomname', 255)->nullable()->comment('Name of the communication room');
            $table->string('avatarfilename', 100)->nullable()->comment('Name of the avatar file name for the communication instance');
            $table->boolean('active')->default(1)->comment('The communication instance is active or not');
            $table->boolean('avatarsynced')->default(0)->comment('Indicate if the avatar has been synced with the provider');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication');
    }
};
