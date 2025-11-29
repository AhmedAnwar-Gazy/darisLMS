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
        // List of temporary access grants.
        Schema::create('repository_onedrive_access', function (Blueprint $table) {
            $table->id('id');
            $table->integer('timemodified');
            $table->integer('timecreated');
            $table->unsignedBigInteger('usermodified');
            $table->string('permissionid', 255)->comment('The permission id in OneDrive.');
            $table->string('itemid', 255)->comment('The item id in OneDrive.');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repository_onedrive_access');
    }
};
