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
        // drop regions
        Schema::create('qtype_ddmarker_drops', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid')->default(0);
            $table->integer('no')->default(0)->comment('drop number');
            $table->string('shape', 255)->nullable()->comment('circle, rectangle, polygon');
            $table->text('coords');
            $table->integer('choice')->default(0);

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_ddmarker_drops');
    }
};
