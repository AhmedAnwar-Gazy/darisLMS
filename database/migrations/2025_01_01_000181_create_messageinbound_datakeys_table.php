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
        // Inbound Message data item secret keys.
        Schema::create('messageinbound_datakeys', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('handler')->comment('The handler that this key belongs to.');
            $table->integer('datavalue')->comment('The integer value of the data item that this key belongs to.');
            $table->string('datakey', 64)->nullable()->comment('The secret key for this data item.');
            $table->integer('timecreated')->comment('The time that the data key was created.');
            $table->integer('expires')->nullable()->comment('The expiry time of this key.');

            // Unique Indexes
            $table->unique(['handler', 'datavalue'], 'handler_datavalue');

            // Foreign Keys
            $table->foreign('handler')->references('id')->on('messageinbound_handlers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messageinbound_datakeys');
    }
};
