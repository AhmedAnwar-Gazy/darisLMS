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
        // Defines settings for connecting external backpack
        Schema::create('badge_backpack', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0);
            $table->string('email', 100);
            $table->integer('backpackuid');
            $table->boolean('autosync')->default(0);
            $table->string('password', 50)->nullable();
            $table->unsignedBigInteger('externalbackpackid')->nullable();

            // Unique Indexes
            $table->unique(['userid', 'externalbackpackid'], 'backpackcredentials');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('externalbackpackid')->references('id')->on('badge_external_backpack');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_backpack');
    }
};
