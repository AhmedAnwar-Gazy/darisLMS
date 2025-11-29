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
        // Stores the position of a sticky block_instance on a another page than the one where it was added.
        Schema::create('block_positions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('blockinstanceid')->comment('The block_instance this position relates to.');
            $table->unsignedBigInteger('contextid')->comment('With pagetype and subpage, defines the page we are setting the position for.');
            $table->string('pagetype', 64)->comment('With contextid and subpage, defines the page we are setting the position for.');
            $table->string('subpage', 16)->comment('With contextid and pagetype, defines the page we are setting the position for.');
            $table->smallInteger('visible')->comment('Whether this block instance is visible on this page.');
            $table->string('region', 16)->comment('Which block region on this page this block should appear in.');
            $table->integer('weight')->comment('Used to order the blocks within a block region.');

            // Unique Indexes
            $table->unique(['blockinstanceid', 'contextid', 'pagetype', 'subpage'], 'blockinstanceid-contextid-pagetype-subpage');

            // Foreign Keys
            $table->foreign('blockinstanceid')->references('id')->on('block_instances');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_positions');
    }
};
