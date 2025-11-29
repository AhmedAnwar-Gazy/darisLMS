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
        // Contains the list of all installed plugins that provide their own language pack
        Schema::create('tool_customlang_components', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->comment('The normalized name of the plugin');
            $table->string('version', 255)->nullable()->comment('The checked out version of the plugin, null if the version is unknown');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_customlang_components');
    }
};
