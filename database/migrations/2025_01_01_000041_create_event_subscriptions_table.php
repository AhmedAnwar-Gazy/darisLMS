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
        // Tracks subscriptions to remote calendars.
        Schema::create('event_subscriptions', function (Blueprint $table) {
            $table->id('id');
            $table->string('url', 255);
            $table->integer('categoryid')->default(0);
            $table->unsignedBigInteger('courseid')->default(0);
            $table->integer('groupid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->string('eventtype', 20)->comment('The type of the event');
            $table->integer('pollinterval')->default(0)->comment('Frequency of checks for new/changed events');
            $table->integer('lastupdated')->nullable();
            $table->string('name', 255);

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_subscriptions');
    }
};
