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
        // List of analysables used by each model
        Schema::create('analytics_used_analysables', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('modelid');
            $table->string('action', 50);
            $table->integer('analysableid');
            $table->integer('firstanalysis');
            $table->integer('timeanalysed');

            // Indexes
            $table->index(['modelid', 'action'], 'modelid-action');
            $table->index(['analysableid'], 'analysableid');

            // Foreign Keys
            $table->foreign('modelid')->references('id')->on('analytics_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_used_analysables');
    }
};
