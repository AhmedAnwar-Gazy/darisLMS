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
        // Every action is logged as far as possible
        Schema::create('log', function (Blueprint $table) {
            $table->id('id');
            $table->integer('time')->default(0);
            $table->integer('userid')->default(0);
            $table->string('ip', 45);
            $table->integer('course')->default(0);
            $table->string('module', 20);
            $table->integer('cmid')->default(0);
            $table->string('action', 40);
            $table->string('url', 100);
            $table->string('info', 255);

            // Indexes
            $table->index(['course', 'module', 'action'], 'course-module-action');
            $table->index(['time'], 'time');
            $table->index(['action'], 'action');
            $table->index(['userid', 'course'], 'userid-course');
            $table->index(['cmid'], 'cmid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log');
    }
};
