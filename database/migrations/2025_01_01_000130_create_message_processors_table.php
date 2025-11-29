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
        // List of message output plugins
        Schema::create('message_processors', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 166)->comment('Name of the message processor');
            $table->boolean('enabled')->default(1)->comment('Defines if processor is enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_processors');
    }
};
