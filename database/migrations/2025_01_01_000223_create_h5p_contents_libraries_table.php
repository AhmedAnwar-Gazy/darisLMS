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
        // Store which library is used in which content.
        Schema::create('h5p_contents_libraries', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('h5pid')->comment('Identifier for the h5p content');
            $table->unsignedBigInteger('libraryid')->comment('The identifier of a H5P library this content uses');
            $table->string('dependencytype', 10)->comment('dynamic, preloaded or editor');
            $table->boolean('dropcss')->comment('1 if the preloaded css from the dependency is to be excluded');
            $table->integer('weight')->comment('Determines the order in which the preloaded libraries will be loaded');

            // Foreign Keys
            $table->foreign('h5pid')->references('id')->on('h5p');
            $table->foreign('libraryid')->references('id')->on('h5p_libraries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5p_contents_libraries');
    }
};
