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
        // this defines all capabilities
        Schema::create('capabilities', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->string('captype', 50);
            $table->integer('contextlevel')->default(0);
            $table->string('component', 100);
            $table->integer('riskbitmask')->default(0);

            // Unique Indexes
            $table->unique(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capabilities');
    }
};
