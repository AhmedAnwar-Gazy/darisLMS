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
        // config for portfolio plugin instances
        Schema::create('portfolio_instance_config', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('instance')->comment('instance of plugin we\'re configurating');
            $table->string('name', 255)->comment('config field');
            $table->text('value')->nullable()->comment('config value');

            // Indexes
            $table->index(['name'], 'name');

            // Foreign Keys
            $table->foreign('instance')->references('id')->on('portfolio_instance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_instance_config');
    }
};
