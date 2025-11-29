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
        // For keeping information about cached data
        Schema::create('cache_filters', function (Blueprint $table) {
            $table->id('id');
            $table->string('filter', 32);
            $table->integer('version')->default(0);
            $table->string('md5key', 32);
            $table->text('rawtext');
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['filter', 'md5key'], 'filter_md5key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache_filters');
    }
};
