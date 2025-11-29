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
        // Options for short answer questions
        Schema::create('qtype_shortanswer_options', function (Blueprint $table) {
            $table->id('id');
            $table->integer('questionid')->default(0)->comment('Foreign key references question.id.');
            $table->tinyInteger('usecase')->default(0)->comment('Whether answers are matched case-sensitively.');

            // Unique Indexes
            $table->unique(['questionid'], 'questionid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_shortanswer_options');
    }
};
