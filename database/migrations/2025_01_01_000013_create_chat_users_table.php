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
        // Keeps track of which users are in which chat rooms
        Schema::create('chat_users', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('chatid')->default(0);
            $table->bigInteger('userid')->default(0);
            $table->bigInteger('groupid')->default(0);
            $table->string('version', 16);
            $table->string('ip', 45);
            $table->integer('firstping')->default(0);
            $table->integer('lastping')->default(0);
            $table->integer('lastmessageping')->default(0);
            $table->string('sid', 32);
            $table->unsignedBigInteger('course')->default(0);
            $table->string('lang', 30);

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['lastping'], 'lastping');
            $table->index(['groupid'], 'groupid');

            // Foreign Keys
            $table->foreign('chatid')->references('id')->on('chat');
            $table->foreign('course')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_users');
    }
};
