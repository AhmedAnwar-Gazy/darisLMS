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
        // Lists which roles can be assigned at which context levels. The assignment is allowed in the corresponding row is present in this table.
        Schema::create('role_context_levels', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('roleid');
            $table->integer('contextlevel');

            // Unique Indexes
            $table->unique(['contextlevel', 'roleid'], 'contextlevel-roleid');

            // Foreign Keys
            $table->foreign('roleid')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_context_levels');
    }
};
