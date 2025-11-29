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
        // The config for intances
        Schema::create('repository_instance_config', function (Blueprint $table) {
            $table->id('id');
            $table->integer('instanceid');
            $table->string('name', 255);
            $table->text('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repository_instance_config');
    }
};
