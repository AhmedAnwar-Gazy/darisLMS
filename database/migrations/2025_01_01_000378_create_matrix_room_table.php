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
        // Stores the matrix room information associated with the communication instance.
        Schema::create('matrix_room', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('commid')->comment('ID of the communication record');
            $table->string('roomid', 255)->nullable()->comment('ID of the matrix room instance');
            $table->string('topic', 255)->nullable()->comment('Topic of the matrix room instance.');

            // Foreign Keys
            $table->foreign('commid')->references('id')->on('communication');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matrix_room');
    }
};
