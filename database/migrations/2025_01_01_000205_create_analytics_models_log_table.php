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
        // Analytic models changes during evaluation.
        Schema::create('analytics_models_log', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('modelid');
            $table->integer('version');
            $table->string('evaluationmode', 50);
            $table->string('target', 255);
            $table->text('indicators');
            $table->string('timesplitting', 255)->nullable();
            $table->decimal('score', 10, 5)->default(0);
            $table->text('info')->nullable();
            $table->text('dir');
            $table->integer('timecreated');
            $table->unsignedBigInteger('usermodified');

            // Foreign Keys
            $table->foreign('modelid')->references('id')->on('analytics_models');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_models_log');
    }
};
