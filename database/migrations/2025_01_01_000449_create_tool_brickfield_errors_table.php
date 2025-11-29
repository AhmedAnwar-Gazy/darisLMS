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
        // Errors during the accessibility checks
        Schema::create('tool_brickfield_errors', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('resultid');
            $table->integer('linenumber')->default(0);
            $table->text('errordata')->nullable();
            $table->text('htmlcode')->nullable();

            // Foreign Keys
            $table->foreign('resultid')->references('id')->on('tool_brickfield_results');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_errors');
    }
};
