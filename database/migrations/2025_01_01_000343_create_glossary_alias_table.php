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
        // entries alias
        Schema::create('glossary_alias', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('entryid')->default(0);
            $table->string('alias', 255);

            // Foreign Keys
            $table->foreign('entryid')->references('id')->on('glossary_entries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary_alias');
    }
};
