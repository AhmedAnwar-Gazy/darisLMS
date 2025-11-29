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
        // H5P cached library assets
        Schema::create('h5p_libraries_cachedassets', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('libraryid');
            $table->string('hash', 255)->comment('Cache hash key that this library is part of.');

            // Foreign Keys
            $table->foreign('libraryid')->references('id')->on('h5p_libraries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5p_libraries_cachedassets');
    }
};
