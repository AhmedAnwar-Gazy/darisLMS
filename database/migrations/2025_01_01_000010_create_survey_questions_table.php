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
        // the questions conforming one survey
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id('id');
            $table->string('text', 255);
            $table->string('shorttext', 30);
            $table->string('multi', 100);
            $table->string('intro', 50);
            $table->tinyInteger('type')->default(0);
            $table->text('options')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_questions');
    }
};
