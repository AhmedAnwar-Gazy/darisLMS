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
        // core_customfield category table
        Schema::create('customfield_category', function (Blueprint $table) {
            $table->id('id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->integer('descriptionformat')->nullable();
            $table->integer('sortorder')->nullable();
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->string('component', 100);
            $table->string('area', 100);
            $table->integer('itemid')->default(0);
            $table->unsignedBigInteger('contextid')->nullable();

            // Indexes
            $table->index(['component', 'area', 'itemid', 'sortorder'], 'component_area_itemid');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customfield_category');
    }
};
