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
        // Defines settings for site level backpacks that a user can connect to.
        Schema::create('badge_external_backpack', function (Blueprint $table) {
            $table->id('id');
            $table->string('backpackapiurl', 255);
            $table->string('backpackweburl', 255);
            $table->string('apiversion', 12)->default(1.0);
            $table->integer('sortorder')->default(0);
            $table->unsignedBigInteger('oauth2_issuerid')->nullable()->comment('OAuth 2 Issuer');

            // Unique Indexes
            $table->unique(['backpackapiurl'], 'backpackapiurlkey');
            $table->unique(['backpackweburl'], 'backpackweburlkey');

            // Foreign Keys
            $table->foreign('oauth2_issuerid')->references('id')->on('oauth2_issuer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_external_backpack');
    }
};
