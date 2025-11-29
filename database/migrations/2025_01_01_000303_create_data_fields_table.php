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
        // every field available
        Schema::create('data_fields', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('dataid')->default(0);
            $table->string('type', 255);
            $table->string('name', 255);
            $table->text('description');
            $table->boolean('required')->default(0)->comment('Required fields must have a value when inserted by a user');
            $table->text('param1')->nullable();
            $table->text('param2')->nullable();
            $table->text('param3')->nullable();
            $table->text('param4')->nullable();
            $table->text('param5')->nullable();
            $table->text('param6')->nullable();
            $table->text('param7')->nullable();
            $table->text('param8')->nullable();
            $table->text('param9')->nullable();
            $table->text('param10')->nullable();

            // Indexes
            $table->index(['type', 'dataid'], 'type-dataid');

            // Foreign Keys
            $table->foreign('dataid')->references('id')->on('data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_fields');
    }
};
