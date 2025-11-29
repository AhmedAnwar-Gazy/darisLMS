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
        // all categories for glossary entries
        Schema::create('glossary_categories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('glossaryid')->default(0);
            $table->string('name', 255);
            $table->tinyInteger('usedynalink')->default(1);

            // Foreign Keys
            $table->foreign('glossaryid')->references('id')->on('glossary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary_categories');
    }
};
