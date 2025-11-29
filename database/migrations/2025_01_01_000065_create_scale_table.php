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
        // Defines grading scales
        Schema::create('scale', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->string('name', 255);
            $table->text('scale');
            $table->text('description');
            $table->tinyInteger('descriptionformat')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['courseid'], 'courseid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scale');
    }
};
