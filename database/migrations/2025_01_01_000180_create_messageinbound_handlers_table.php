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
        // Inbound Message Handler definitions.
        Schema::create('messageinbound_handlers', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 100)->comment('The component this handler belongs to.');
            $table->string('classname', 255)->comment('The class defining the Inbound Message handler to be called.');
            $table->integer('defaultexpiration')->default(86400)->comment('The default expiration period to use when creating a new key');
            $table->boolean('validateaddress')->default(1)->comment('Whether to validate the sender address against the user record.');
            $table->boolean('enabled')->default(0)->comment('Whether this handler is currently enabled.');

            // Unique Indexes
            $table->unique(['classname'], 'classname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messageinbound_handlers');
    }
};
