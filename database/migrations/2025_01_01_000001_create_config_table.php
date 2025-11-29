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
        // Moodle configuration variables
        Schema::create('config', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->text('value');

            // Unique Indexes
            $table->unique(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config');
    }
};
