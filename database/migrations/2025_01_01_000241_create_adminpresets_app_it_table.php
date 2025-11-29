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
        // Admin presets applied items. To maintain the relation with config_log
        Schema::create('adminpresets_app_it', function (Blueprint $table) {
            $table->id('id');
            $table->integer('adminpresetapplyid');
            $table->integer('configlogid');

            // Indexes
            $table->index(['configlogid'], 'configlogid');
            $table->index(['adminpresetapplyid'], 'adminpresetapplyid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets_app_it');
    }
};
