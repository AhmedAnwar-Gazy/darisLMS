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
        // Stores active and inactive lock types for db locking method.
        Schema::create('lock_db', function (Blueprint $table) {
            $table->id('id');
            $table->string('resourcekey', 255)->comment('String identifying the resource to be locked. Should use frankenstyle format.');
            $table->integer('expires')->nullable()->comment('Expiry time for an active lock.');
            $table->string('owner', 36)->nullable()->comment('uuid indicating the owner of the lock.');

            // Indexes
            $table->index(['expires'], 'expires_idx');
            $table->index(['owner'], 'owner_idx');

            // Unique Indexes
            $table->unique(['resourcekey'], 'resourcekey_uniq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lock_db');
    }
};
