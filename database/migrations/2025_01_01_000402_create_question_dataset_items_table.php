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
        // Individual dataset items
        Schema::create('question_dataset_items', function (Blueprint $table) {
            $table->id('id');
            $table->integer('definition')->default(0);
            $table->integer('itemnumber')->default(0);
            $table->string('value', 255);

            // Indexes
            $table->index(['definition'], 'definition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_dataset_items');
    }
};
