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
        // text about each survey submission
        Schema::create('survey_analysis', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('survey')->default(0);
            $table->integer('userid')->default(0);
            $table->text('notes');

            // Indexes
            $table->index(['userid'], 'userid');

            // Foreign Keys
            $table->foreign('survey')->references('id')->on('survey');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_analysis');
    }
};
