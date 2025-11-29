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
        // Data categories
        Schema::create('tool_dataprivacy_category', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->boolean('descriptionformat')->nullable();
            $table->integer('usermodified');
            $table->integer('timecreated');
            $table->integer('timemodified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_category');
    }
};
