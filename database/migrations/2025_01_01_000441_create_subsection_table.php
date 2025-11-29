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
        Schema::create('subsection', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('course')->default(0);
            $table->string('name', 1333)->default('');
            $table->bigInteger('timemodified')->default(0);

            // Indexes
            $table->index(['course'], 'subs_cou_ix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsection');
    }
};
