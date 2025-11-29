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
        // Admin presets plugins applied
        Schema::create('adminpresets_app_plug', function (Blueprint $table) {
            $table->id('id');
            $table->integer('adminpresetapplyid');
            $table->string('plugin', 100)->nullable();
            $table->string('name', 100);
            $table->smallInteger('value')->default(0);
            $table->smallInteger('oldvalue')->default(0);

            // Indexes
            $table->index(['adminpresetapplyid'], 'adminpresetapplyid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets_app_plug');
    }
};
