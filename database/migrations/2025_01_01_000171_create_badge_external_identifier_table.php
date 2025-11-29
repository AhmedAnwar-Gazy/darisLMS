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
        // Setting for external badges mappings
        Schema::create('badge_external_identifier', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('sitebackpackid')->comment('ID of a site backpack');
            $table->string('internalid', 128);
            $table->string('externalid', 128);
            $table->string('type', 16);

            // Unique Indexes
            $table->unique(['sitebackpackid', 'internalid', 'externalid', 'type'], 'backpack-internal-external');

            // Foreign Keys
            $table->foreign('sitebackpackid')->references('id')->on('badge_backpack');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_external_identifier');
    }
};
