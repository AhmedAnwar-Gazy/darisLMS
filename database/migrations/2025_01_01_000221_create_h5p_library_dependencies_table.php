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
        // Stores H5P library dependencies
        Schema::create('h5p_library_dependencies', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('libraryid')->comment('The id of a H5P library.');
            $table->unsignedBigInteger('requiredlibraryid')->comment('The dependent library to load');
            $table->string('dependencytype', 255)->comment('preloaded, dynamic, or editor');

            // Foreign Keys
            $table->foreign('libraryid')->references('id')->on('h5p_libraries');
            $table->foreign('requiredlibraryid')->references('id')->on('h5p_libraries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5p_library_dependencies');
    }
};
