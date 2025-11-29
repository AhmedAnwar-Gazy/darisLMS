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
        // Information about the services for a given host
        Schema::create('mnet_host2service', function (Blueprint $table) {
            $table->id('id');
            $table->integer('hostid')->default(0);
            $table->integer('serviceid')->default(0);
            $table->boolean('publish')->default(0);
            $table->boolean('subscribe')->default(0);

            // Unique Indexes
            $table->unique(['hostid', 'serviceid'], 'hostid_serviceid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_host2service');
    }
};
