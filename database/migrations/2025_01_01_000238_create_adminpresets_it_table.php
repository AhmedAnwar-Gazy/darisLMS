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
        // Table to store settings
        Schema::create('adminpresets_it', function (Blueprint $table) {
            $table->id('id');
            $table->integer('adminpresetid');
            $table->string('plugin', 100)->nullable();
            $table->string('name', 100);
            $table->text('value')->nullable();

            // Indexes
            $table->index(['adminpresetid'], 'adminpresetid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets_it');
    }
};
