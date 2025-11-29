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
        // each record is one url resource
        Schema::create('url', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->text('externalurl');
            $table->smallInteger('display')->default(0);
            $table->text('displayoptions')->nullable();
            $table->text('parameters')->nullable();
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url');
    }
};
