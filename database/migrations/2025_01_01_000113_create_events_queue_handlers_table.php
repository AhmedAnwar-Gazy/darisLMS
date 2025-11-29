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
        // This is the list of queued handlers for processing. The event object is retrieved from the events_queue table. When no further reference is made to the event_queues table, the corresponding entry in the events_queue table should be deleted. Entry should get deleted after a successful event processing by the specified handler.
        Schema::create('events_queue_handlers', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('queuedeventid')->comment('foreign key id corresponding to the id of the event_queues table');
            $table->unsignedBigInteger('handlerid')->comment('foreign key id corresponding to the id of the event_handlers table');
            $table->integer('status')->nullable()->comment('number of failed attempts to process this handler');
            $table->text('errormessage')->nullable()->comment('if an error happened last time we tried to process this event, record it here.');
            $table->integer('timemodified')->comment('time stamp of the last attempt to run this from the queue');

            // Foreign Keys
            $table->foreign('queuedeventid')->references('id')->on('events_queue');
            $table->foreign('handlerid')->references('id')->on('events_handlers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_queue_handlers');
    }
};
