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
        // modules available in the site
        Schema::create('modules', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 20);
            $table->integer('cron')->default(0);
            $table->integer('lastcron')->default(0);
            $table->string('search', 255);
            $table->boolean('visible')->default(1);

            // Indexes
            $table->index(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
