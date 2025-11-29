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
        // A list of message IDs for existing replies
        Schema::create('messageinbound_messagelist', function (Blueprint $table) {
            $table->id('id');
            $table->text('messageid');
            $table->unsignedBigInteger('userid');
            $table->text('address')->comment('The Inbound Message address that the message was originally sent to');
            $table->integer('timecreated');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messageinbound_messagelist');
    }
};
