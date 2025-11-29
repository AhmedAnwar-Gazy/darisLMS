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
        // Users by host permitted (or not) to login from a remote provider
        Schema::create('mnet_sso_access_control', function (Blueprint $table) {
            $table->id('id');
            $table->string('username', 100)->comment('Username');
            $table->integer('mnet_host_id')->default(0)->comment('id of mnet host');
            $table->string('accessctrl', 20)->default('allow')->comment('Whether or not this user/host can login');

            // Unique Indexes
            $table->unique(['mnet_host_id', 'username'], 'mnethostid_username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_sso_access_control');
    }
};
