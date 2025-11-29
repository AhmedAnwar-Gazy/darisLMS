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
        // Recent activity block
        Schema::create('block_recent_activity', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->comment('Course id');
            $table->integer('cmid')->comment('Course module id');
            $table->integer('timecreated');
            $table->integer('userid')->comment('User performing the action');
            $table->boolean('action')->comment('0 created, 1 updated, 2 deleted');
            $table->string('modname', 20)->nullable()->comment('module type name (for delete action)');

            // Indexes
            $table->index(['courseid', 'timecreated'], 'coursetime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_recent_activity');
    }
};
