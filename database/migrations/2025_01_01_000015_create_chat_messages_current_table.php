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
        // Stores current session
        Schema::create('chat_messages_current', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('chatid')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('groupid')->default(0);
            $table->boolean('issystem')->default(0);
            $table->text('message');
            $table->integer('timestamp')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['groupid'], 'groupid');
            $table->index(['timestamp', 'chatid'], 'timestamp-chatid');

            // Foreign Keys
            $table->foreign('chatid')->references('id')->on('chat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages_current');
    }
};
