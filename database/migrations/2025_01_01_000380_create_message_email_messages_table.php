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
        // Keeps track of what emails to send in an email digest
        Schema::create('message_email_messages', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('useridto');
            $table->unsignedBigInteger('conversationid');
            $table->unsignedBigInteger('messageid');

            // Foreign Keys
            $table->foreign('useridto')->references('id')->on('users');
            $table->foreign('conversationid')->references('id')->on('message_conversations');
            $table->foreign('messageid')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_email_messages');
    }
};
