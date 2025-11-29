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
        // Information about the local and remote hosts for RPC
        Schema::create('mnet_host', function (Blueprint $table) {
            $table->id('id');
            $table->boolean('deleted')->default(0);
            $table->string('wwwroot', 255);
            $table->string('ip_address', 45);
            $table->string('name', 80);
            $table->text('public_key');
            $table->integer('public_key_expires')->default(0);
            $table->tinyInteger('transport')->default(0);
            $table->smallInteger('portno')->default(0);
            $table->integer('last_connect_time')->default(0);
            $table->integer('last_log_id')->default(0);
            $table->boolean('force_theme')->default(0);
            $table->string('theme', 100)->nullable();
            $table->unsignedBigInteger('applicationid')->default(1);
            $table->boolean('sslverification')->default(0);

            // Indexes
            $table->index(['last_log_id'], 'last_log_id');

            // Foreign Keys
            $table->foreign('applicationid')->references('id')->on('mnet_application');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_host');
    }
};
