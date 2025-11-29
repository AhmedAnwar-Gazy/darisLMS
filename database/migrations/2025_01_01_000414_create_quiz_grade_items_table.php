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
        Schema::create('quiz_grade_items', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('quizid');
            $table->bigInteger('sortorder');
            $table->string('name', 255)->default('');

            // Indexes
            $table->index(['quizid'], 'quizgraditem_qui_ix');

            // Unique Indexes
            $table->unique(['quizid', 'sortorder'], 'quizgraditem_quisor_uix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_grade_items');
    }
};
