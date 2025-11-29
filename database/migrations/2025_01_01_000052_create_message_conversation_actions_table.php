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
        // Stores all per-user actions on individual conversations
        Schema::create('message_conversation_actions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('conversationid');
            $table->integer('action');
            $table->integer('timecreated');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('conversationid')->references('id')->on('message_conversations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_conversation_actions');
    }
};
