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
        // A service is a group of functions
        Schema::create('mnet_service', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 40);
            $table->string('description', 40);
            $table->string('apiversion', 10);
            $table->boolean('offer')->default(0)->comment('Do we even offer this service?');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_service');
    }
};
