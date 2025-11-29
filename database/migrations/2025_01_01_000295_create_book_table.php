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
        // Defines book
        Schema::create('book', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('course')->default(0);
            $table->string('name', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->smallInteger('numbering')->default(0);
            $table->smallInteger('navstyle')->default(1);
            $table->tinyInteger('customtitles')->default(0);
            $table->integer('revision')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('course')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
