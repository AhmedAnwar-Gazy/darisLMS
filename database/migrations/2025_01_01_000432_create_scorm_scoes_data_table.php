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
        // Contains variable data get from packages
        Schema::create('scorm_scoes_data', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('scoid')->default(0);
            $table->string('name', 255);
            $table->text('value');

            // Foreign Keys
            $table->foreign('scoid')->references('id')->on('scorm_scoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorm_scoes_data');
    }
};
