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
        // Maintains lists of contacts between users
        Schema::create('message_contacts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('contactid');
            $table->integer('timecreated')->nullable();

            // Unique Indexes
            $table->unique(['userid', 'contactid'], 'userid-contactid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('contactid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_contacts');
    }
};
