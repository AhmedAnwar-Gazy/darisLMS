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
        // This table describes functions that might be called remotely (we have less information about them than local functions)
        Schema::create('mnet_remote_rpc', function (Blueprint $table) {
            $table->id('id');
            $table->string('functionname', 40);
            $table->string('xmlrpcpath', 80);
            $table->string('plugintype', 20);
            $table->string('pluginname', 20);
            $table->boolean('enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_remote_rpc');
    }
};
