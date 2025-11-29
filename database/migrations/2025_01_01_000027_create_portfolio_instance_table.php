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
        // base table (not including config data) for instances of portfolio plugins.
        Schema::create('portfolio_instance', function (Blueprint $table) {
            $table->id('id');
            $table->string('plugin', 50)->comment('fk to plugin');
            $table->string('name', 255)->comment('name of plugin instance');
            $table->boolean('visible')->default(1)->comment('whether this instance is visible or not');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_instance');
    }
};
