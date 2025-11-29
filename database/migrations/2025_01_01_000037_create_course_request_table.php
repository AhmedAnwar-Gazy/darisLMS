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
        // course requests
        Schema::create('course_request', function (Blueprint $table) {
            $table->id('id');
            $table->string('fullname', 254);
            $table->string('shortname', 100);
            $table->text('summary');
            $table->tinyInteger('summaryformat')->default(0);
            $table->integer('category')->default(0);
            $table->text('reason');
            $table->integer('requester')->default(0);
            $table->string('password', 50);

            // Indexes
            $table->index(['shortname'], 'shortname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_request');
    }
};
