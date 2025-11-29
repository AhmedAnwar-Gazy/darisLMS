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
        // contains all installed blocks
        Schema::create('block', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 40);
            $table->integer('cron')->default(0);
            $table->integer('lastcron')->default(0);
            $table->boolean('visible')->default(1);

            // Unique Indexes
            $table->unique(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block');
    }
};
