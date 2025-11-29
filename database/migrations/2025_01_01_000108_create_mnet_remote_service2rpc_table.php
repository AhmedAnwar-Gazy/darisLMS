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
        // Group functions or methods under a service
        Schema::create('mnet_remote_service2rpc', function (Blueprint $table) {
            $table->id('id');
            $table->integer('serviceid')->default(0)->comment('Unique service ID');
            $table->integer('rpcid')->default(0)->comment('Unique Function ID');

            // Unique Indexes
            $table->unique(['rpcid', 'serviceid'], 'rpcid_serviceid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_remote_service2rpc');
    }
};
