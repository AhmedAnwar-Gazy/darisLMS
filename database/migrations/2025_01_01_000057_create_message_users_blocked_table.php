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
        // Maintains lists of blocked users
        Schema::create('message_users_blocked', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('blockeduserid');
            $table->integer('timecreated')->nullable();

            // Unique Indexes
            $table->unique(['userid', 'blockeduserid'], 'userid-blockeduserid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('blockeduserid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_users_blocked');
    }
};
