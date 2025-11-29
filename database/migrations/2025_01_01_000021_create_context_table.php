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
        // one of these must be set
        Schema::create('context', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextlevel')->default(0);
            $table->integer('instanceid')->default(0);
            $table->string('path', 255)->nullable();
            $table->tinyInteger('depth')->default(0);
            $table->tinyInteger('locked')->default(0)->comment('Whether this context and its children are locked');

            // Indexes
            $table->index(['instanceid'], 'instanceid');
            $table->index(['path'], 'path');

            // Unique Indexes
            $table->unique(['contextlevel', 'instanceid'], 'contextlevel-instanceid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('context');
    }
};
