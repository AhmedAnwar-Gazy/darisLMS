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
        // Analytic models.
        Schema::create('analytics_models', function (Blueprint $table) {
            $table->id('id');
            $table->boolean('enabled')->default(0);
            $table->boolean('trained')->default(0);
            $table->text('name')->nullable()->comment('Explicit name of the model, the localised target name is used when left empty');
            $table->string('target', 255);
            $table->text('indicators');
            $table->string('timesplitting', 255)->nullable();
            $table->string('predictionsprocessor', 255)->nullable();
            $table->integer('version');
            $table->text('contextids')->nullable()->comment('The model will be restricted to this contexts');
            $table->integer('timecreated')->nullable();
            $table->integer('timemodified');
            $table->unsignedBigInteger('usermodified');

            // Indexes
            $table->index(['enabled', 'trained'], 'enabledandtrained');

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_models');
    }
};
