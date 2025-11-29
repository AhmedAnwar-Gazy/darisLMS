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
        // Stores per-context configuration settings for filters which have them.
        Schema::create('filter_config', function (Blueprint $table) {
            $table->id('id');
            $table->string('filter', 32)->comment('The filter internal name, like \'tex\'.');
            $table->unsignedBigInteger('contextid')->comment('References context.id.');
            $table->string('name', 255)->comment('The config variable name.');
            $table->text('value')->nullable()->comment('The correspoding config variable value.');

            // Unique Indexes
            $table->unique(['contextid', 'filter', 'name'], 'contextid-filter-name');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_config');
    }
};
