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
        // This table is for storing queued events. It stores only one copy of the eventdata here, and entries from this table are being references by the event_queue_handlers table.
        Schema::create('events_queue', function (Blueprint $table) {
            $table->id('id');
            $table->text('eventdata')->comment('serialized version of the data object passed to the event handler.');
            $table->text('stackdump')->nullable()->comment('serialized debug_backtrace showing where the event was fired from');
            $table->unsignedBigInteger('userid')->nullable()->comment('$USER-&gt;id when the event was fired');
            $table->integer('timecreated')->comment('time stamp of the first time this was added');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_queue');
    }
};
