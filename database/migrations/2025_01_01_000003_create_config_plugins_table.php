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
        // Moodle modules and plugins configuration variables
        Schema::create('config_plugins', function (Blueprint $table) {
            $table->id('id');
            $table->string('plugin', 100)->default('core');
            $table->string('name', 100);
            $table->text('value');

            // Unique Indexes
            $table->unique(['plugin', 'name'], 'plugin_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_plugins');
    }
};
