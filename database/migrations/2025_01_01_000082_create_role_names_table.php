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
        // role names in native strings
        Schema::create('role_names', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('roleid')->default(0);
            $table->unsignedBigInteger('contextid')->default(0);
            $table->string('name', 255);

            // Unique Indexes
            $table->unique(['roleid', 'contextid'], 'roleid-contextid');

            // Foreign Keys
            $table->foreign('roleid')->references('id')->on('role');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_names');
    }
};
