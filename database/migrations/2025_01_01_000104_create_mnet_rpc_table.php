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
        // Functions or methods that we may publish or subscribe to
        Schema::create('mnet_rpc', function (Blueprint $table) {
            $table->id('id');
            $table->string('functionname', 40);
            $table->string('xmlrpcpath', 80);
            $table->string('plugintype', 20);
            $table->string('pluginname', 20);
            $table->boolean('enabled')->default(0);
            $table->text('help');
            $table->text('profile')->comment('Method signature');
            $table->string('filename', 100);
            $table->string('classname', 150)->nullable();
            $table->boolean('static')->nullable();

            // Indexes
            $table->index(['enabled', 'xmlrpcpath'], 'enabled_xmlrpcpath');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnet_rpc');
    }
};
