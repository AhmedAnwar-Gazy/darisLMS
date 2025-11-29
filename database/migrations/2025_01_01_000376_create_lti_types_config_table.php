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
        // Basic LTI types configuration
        Schema::create('lti_types_config', function (Blueprint $table) {
            $table->id('id');
            $table->integer('typeid')->comment('Basic LTI type id');
            $table->string('name', 100)->comment('Basic LTI param');
            $table->text('value')->comment('Param value');

            // Indexes
            $table->index(['typeid'], 'typeid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_types_config');
    }
};
