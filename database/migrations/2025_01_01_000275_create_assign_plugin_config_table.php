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
        // Config data for an instance of a plugin in an assignment.
        Schema::create('assign_plugin_config', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->string('plugin', 28);
            $table->string('subtype', 28);
            $table->string('name', 28);
            $table->text('value')->nullable()->comment('The value of the config setting. Stored as text but can be interpreted by the plugin however it likes.');

            // Indexes
            $table->index(['plugin'], 'plugin');
            $table->index(['subtype'], 'subtype');
            $table->index(['name'], 'name');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_plugin_config');
    }
};
