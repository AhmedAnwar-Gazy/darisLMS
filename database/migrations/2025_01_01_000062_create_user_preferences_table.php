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
        // Allows modules to store arbitrary user preferences
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->string('name', 255);
            $table->text('value');

            // Indexes
            $table->index(['name'], 'name');

            // Unique Indexes
            $table->unique(['userid', 'name'], 'userid-name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
