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
        // Cache of time-sensitive flags
        Schema::create('cache_flags', function (Blueprint $table) {
            $table->id('id');
            $table->string('flagtype', 255);
            $table->string('name', 255);
            $table->integer('timemodified')->default(0);
            $table->text('value');
            $table->integer('expiry');

            // Indexes
            $table->index(['flagtype'], 'flagtype');
            $table->index(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache_flags');
    }
};
