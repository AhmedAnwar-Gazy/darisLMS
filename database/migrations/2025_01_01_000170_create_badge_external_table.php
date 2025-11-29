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
        // Setting for external badges display
        Schema::create('badge_external', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('backpackid')->comment('ID of a backpack');
            $table->integer('collectionid')->comment('Badge collection id in the backpack');
            $table->string('entityid', 255)->nullable();
            $table->text('assertion')->nullable()->comment('Assertion of external badge');

            // Foreign Keys
            $table->foreign('backpackid')->references('id')->on('badge_backpack');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_external');
    }
};
