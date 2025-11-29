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
        // categories of each glossary entry
        Schema::create('glossary_entries_categories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('categoryid')->default(0);
            $table->unsignedBigInteger('entryid')->default(0);

            // Foreign Keys
            $table->foreign('categoryid')->references('id')->on('glossary_categories');
            $table->foreign('entryid')->references('id')->on('glossary_entries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary_entries_categories');
    }
};
