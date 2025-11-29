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
        // Stores information about libraries used by H5P content.
        Schema::create('h5p_libraries', function (Blueprint $table) {
            $table->id('id');
            $table->string('machinename', 255)->comment('The library machine name');
            $table->string('title', 255)->comment('The human readable name of this library');
            $table->smallInteger('majorversion');
            $table->smallInteger('minorversion');
            $table->smallInteger('patchversion');
            $table->boolean('runnable')->comment('Can this library be started by the module? i.e. not a dependency.');
            $table->boolean('fullscreen')->default(0)->comment('Display fullscreen button');
            $table->string('embedtypes', 255)->comment('List of supported embed types');
            $table->text('preloadedjs')->nullable()->comment('Comma separated list of scripts to load.');
            $table->text('preloadedcss')->nullable()->comment('Comma separated list of stylesheets to load.');
            $table->text('droplibrarycss')->nullable()->comment('List of libraries that should not have CSS included if this library is used. Comma separated list.');
            $table->text('semantics')->nullable()->comment('The semantics definition in json format');
            $table->text('addto')->nullable()->comment('Plugin configuration data');
            $table->smallInteger('coremajor')->nullable()->comment('H5P core API major version required');
            $table->smallInteger('coreminor')->nullable()->comment('H5P core API minor version required');
            $table->text('metadatasettings')->nullable()->comment('Library metadata settings');
            $table->text('tutorial')->nullable()->comment('Tutorial URL');
            $table->text('example')->nullable()->comment('Example URL');
            $table->boolean('enabled')->nullable()->default(1)->comment('Defines if this library is enabled (1) or not (0)');

            // Indexes
            $table->index(['machinename', 'majorversion', 'minorversion', 'patchversion', 'runnable'], 'machinemajorminorpatch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h5p_libraries');
    }
};
