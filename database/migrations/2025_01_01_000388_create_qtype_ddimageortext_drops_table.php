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
        // Drop boxes
        Schema::create('qtype_ddimageortext_drops', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid')->default(0);
            $table->integer('no')->default(0)->comment('drop number');
            $table->integer('xleft')->default(0);
            $table->integer('ytop')->default(0);
            $table->integer('choice')->default(0);
            $table->text('label')->comment('Alt label for drop box');

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_ddimageortext_drops');
    }
};
