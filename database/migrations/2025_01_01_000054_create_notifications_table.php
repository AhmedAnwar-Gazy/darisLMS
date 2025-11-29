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
        // Stores all notifications
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id');
            $table->integer('useridfrom');
            $table->unsignedBigInteger('useridto');
            $table->text('subject')->nullable()->comment('The message subject');
            $table->text('fullmessage')->nullable();
            $table->boolean('fullmessageformat')->default(0);
            $table->text('fullmessagehtml')->nullable();
            $table->text('smallmessage')->nullable();
            $table->string('component', 100)->nullable();
            $table->string('eventtype', 100)->nullable();
            $table->text('contexturl')->nullable();
            $table->text('contexturlname')->nullable();
            $table->integer('timeread')->nullable();
            $table->integer('timecreated');
            $table->text('customdata')->nullable()->comment('Custom data to be passed to the message processor. Must be serialisable using json_encode()');

            // Indexes
            $table->index(['useridfrom'], 'useridfrom');

            // Foreign Keys
            $table->foreign('useridto')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
