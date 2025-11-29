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
        // available options to choice
        Schema::create('choice_options', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('choiceid')->default(0);
            $table->text('text')->nullable();
            $table->integer('maxanswers')->nullable()->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('choiceid')->references('id')->on('choice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choice_options');
    }
};
