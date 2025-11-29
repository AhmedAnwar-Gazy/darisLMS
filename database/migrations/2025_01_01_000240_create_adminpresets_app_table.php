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
        // Applied presets
        Schema::create('adminpresets_app', function (Blueprint $table) {
            $table->id('id');
            $table->integer('adminpresetid');
            $table->integer('userid');
            $table->integer('time');

            // Indexes
            $table->index(['adminpresetid'], 'adminpresetid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets_app');
    }
};
