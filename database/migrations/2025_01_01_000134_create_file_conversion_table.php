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
        // Table to track file conversions.
        Schema::create('file_conversion', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('usermodified');
            $table->integer('timecreated');
            $table->integer('timemodified');
            $table->unsignedBigInteger('sourcefileid');
            $table->string('targetformat', 100);
            $table->integer('status')->nullable()->default(0);
            $table->text('statusmessage')->nullable();
            $table->string('converter', 255)->nullable();
            $table->unsignedBigInteger('destfileid')->nullable();
            $table->text('data')->nullable();

            // Foreign Keys
            $table->foreign('sourcefileid')->references('id')->on('files');
            $table->foreign('destfileid')->references('id')->on('files');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_conversion');
    }
};
