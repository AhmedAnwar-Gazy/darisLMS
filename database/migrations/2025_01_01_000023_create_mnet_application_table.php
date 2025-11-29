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
        // Information about applications on remote hosts
        Schema::create('mnet_application', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 50);
            $table->string('display_name', 50);
            $table->string('xmlrpc_server_url', 255);
            $table->string('sso_land_url', 255);
            $table->string('sso_jump_url', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_application');
    }
};
