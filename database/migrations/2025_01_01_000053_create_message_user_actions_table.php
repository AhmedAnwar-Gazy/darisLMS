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
        // Stores all per-user actions on individual messages
        Schema::create('message_user_actions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('messageid');
            $table->integer('action');
            $table->integer('timecreated');

            // Unique Indexes
            $table->unique(['userid', 'messageid', 'action'], 'userid_messageid_action');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('messageid')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_user_actions');
    }
};
