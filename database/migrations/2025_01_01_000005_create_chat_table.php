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
        // Each of these is a chat room
        Schema::create('chat', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0)->comment('text format of intro field');
            $table->bigInteger('keepdays')->default(0);
            $table->smallInteger('studentlogs')->default(0);
            $table->integer('chattime')->default(0);
            $table->smallInteger('schedule')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
