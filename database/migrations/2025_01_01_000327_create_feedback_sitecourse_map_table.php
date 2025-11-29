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
        // feedback sitecourse map
        Schema::create('feedback_sitecourse_map', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('feedbackid')->default(0);
            $table->integer('courseid')->default(0);

            // Indexes
            $table->index(['courseid'], 'courseid');

            // Foreign Keys
            $table->foreign('feedbackid')->references('id')->on('feedback');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_sitecourse_map');
    }
};
