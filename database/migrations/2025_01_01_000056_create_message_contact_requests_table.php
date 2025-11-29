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
        // Maintains list of contact requests between users
        Schema::create('message_contact_requests', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('requesteduserid');
            $table->integer('timecreated');

            // Unique Indexes
            $table->unique(['userid', 'requesteduserid'], 'userid-requesteduserid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('requesteduserid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_contact_requests');
    }
};
