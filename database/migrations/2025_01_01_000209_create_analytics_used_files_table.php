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
        // Files that have already been used for training and prediction.
        Schema::create('analytics_used_files', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('modelid')->default(0);
            $table->unsignedBigInteger('fileid')->default(0);
            $table->string('action', 50);
            $table->integer('time')->default(0);

            // Indexes
            $table->index(['modelid', 'action', 'fileid'], 'modelidandactionandfileid');

            // Foreign Keys
            $table->foreign('modelid')->references('id')->on('analytics_models');
            $table->foreign('fileid')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_used_files');
    }
};
