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
        // Organises and stores properties for dataset items
        Schema::create('question_dataset_definitions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('category')->default(0);
            $table->string('name', 255);
            $table->integer('type')->default(0);
            $table->string('options', 255);
            $table->integer('itemcount')->default(0);

            // Foreign Keys
            $table->foreign('category')->references('id')->on('question_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_dataset_definitions');
    }
};
