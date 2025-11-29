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
        // Stores all messages
        Schema::create('messages', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('useridfrom');
            $table->unsignedBigInteger('conversationid');
            $table->text('subject')->nullable();
            $table->text('fullmessage')->nullable();
            $table->boolean('fullmessageformat')->default(0);
            $table->text('fullmessagehtml')->nullable();
            $table->text('smallmessage')->nullable();
            $table->integer('timecreated');
            $table->tinyInteger('fullmessagetrust')->default(0);
            $table->text('customdata')->nullable()->comment('Custom data to be passed to the message processor. Must be serialisable using json_encode()');

            // Indexes
            $table->index(['conversationid', 'timecreated'], 'conversationid_timecreated');

            // Foreign Keys
            $table->foreign('useridfrom')->references('id')->on('users');
            $table->foreign('conversationid')->references('id')->on('message_conversations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
