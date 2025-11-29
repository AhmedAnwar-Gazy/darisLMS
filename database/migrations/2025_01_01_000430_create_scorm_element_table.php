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
        // List of scorm elements.
        Schema::create('scorm_element', function (Blueprint $table) {
            $table->id('id');
            $table->string('element', 255)->comment('Name of SCORM element');

            // Unique Indexes
            $table->unique(['element'], 'element');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_element');
    }
};
