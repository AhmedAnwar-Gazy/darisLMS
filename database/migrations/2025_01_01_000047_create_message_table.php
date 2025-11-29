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
        // Stores all unread messages
        Schema::create('message', function (Blueprint $table) {
            $table->id('id');
            $table->integer('useridfrom')->default(0);
            $table->integer('useridto')->default(0);
            $table->text('subject')->nullable()->comment('The message subject');
            $table->text('fullmessage')->nullable();
            $table->smallInteger('fullmessageformat')->nullable()->default(0)->comment('The format of the full message');
            $table->text('fullmessagehtml')->nullable()->comment('html format of message');
            $table->text('smallmessage')->nullable()->comment('Smal version of message (eg sms)');
            $table->boolean('notification')->nullable()->default(0);
            $table->text('contexturl')->nullable()->comment('If this message is a notification of an event contexturl should contain a link to view this event. For example if its a notification of a forum post contexturl should contain a link to the forum post.');
            $table->text('contexturlname')->nullable()->comment('Display text for the contexturl');
            $table->integer('timecreated')->default(0);
            $table->integer('timeuserfromdeleted')->default(0);
            $table->integer('timeusertodeleted')->default(0);
            $table->string('component', 100)->nullable();
            $table->string('eventtype', 100)->nullable();
            $table->text('customdata')->nullable()->comment('Custom data to be passed to the message processor. Must be serialisable using json_encode()');

            // Indexes
            $table->index(['useridfrom', 'useridto', 'timeuserfromdeleted', 'timeusertodeleted'], 'useridfromtodeleted');
            $table->index(['useridfrom', 'timeuserfromdeleted', 'notification'], 'useridfrom_timeuserfromdeleted_notification');
            $table->index(['useridto', 'timeusertodeleted', 'notification'], 'useridto_timeusertodeleted_notification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
