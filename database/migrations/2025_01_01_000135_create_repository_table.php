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
        // This table contains one entry for every configured external repository instance.
        Schema::create('repository', function (Blueprint $table) {
            $table->id('id');
            $table->string('type', 255);
            $table->boolean('visible')->nullable()->default(1);
            $table->integer('sortorder')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repository');
    }
};
