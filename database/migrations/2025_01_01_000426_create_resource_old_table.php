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
        // backup of all old resource instances from 1.9
        Schema::create('resource_old', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->string('type', 30);
            $table->string('reference', 255);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->text('alltext');
            $table->text('popup');
            $table->string('options', 255);
            $table->integer('timemodified')->default(0);
            $table->integer('oldid');
            $table->integer('cmid')->nullable();
            $table->string('newmodule', 50)->nullable();
            $table->integer('newid')->nullable();
            $table->integer('migrated')->default(0);

            // Indexes
            $table->index(['cmid'], 'cmid');

            // Unique Indexes
            $table->unique(['oldid'], 'oldid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_old');
    }
};
