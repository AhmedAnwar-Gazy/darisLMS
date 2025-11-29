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
        // This table stores the message providers (modules and core systems)
        Schema::create('message_providers', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 100)->comment('The full name of the message provider in standard form');
            $table->string('component', 200)->comment('The name of the component that produces these messages');
            $table->string('capability', 255)->nullable()->comment('Optional: permission that is required on the user\'s setting screen to see this message provider.');

            // Unique Indexes
            $table->unique(['component', 'name'], 'componentname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_providers');
    }
};
