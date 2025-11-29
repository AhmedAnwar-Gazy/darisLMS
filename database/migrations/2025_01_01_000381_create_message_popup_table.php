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
        // Keep state of notifications for the popup message processor
        Schema::create('message_popup', function (Blueprint $table) {
            $table->id('id');
            $table->integer('messageid');
            $table->boolean('isread')->default(0);

            // Indexes
            $table->index(['isread'], 'isread');

            // Unique Indexes
            $table->unique(['messageid', 'isread'], 'messageid-isread');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_popup');
    }
};
