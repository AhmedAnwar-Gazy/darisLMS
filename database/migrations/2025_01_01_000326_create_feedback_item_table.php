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
        // feedback_items
        Schema::create('feedback_item', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('feedback')->default(0);
            $table->unsignedBigInteger('template')->default(0);
            $table->string('name', 255);
            $table->string('label', 255);
            $table->text('presentation');
            $table->string('typ', 255);
            $table->boolean('hasvalue')->default(0);
            $table->tinyInteger('position')->default(0);
            $table->boolean('required')->default(0);
            $table->integer('dependitem')->default(0);
            $table->string('dependvalue', 255);
            $table->string('options', 255);

            // Foreign Keys
            $table->foreign('feedback')->references('id')->on('feedback');
            $table->foreign('template')->references('id')->on('feedback_template');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_item');
    }
};
