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
        // Stores all members in a conversations
        Schema::create('message_conversation_members', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('conversationid');
            $table->unsignedBigInteger('userid');
            $table->integer('timecreated');

            // Foreign Keys
            $table->foreign('conversationid')->references('id')->on('message_conversations');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_conversation_members');
    }
};
