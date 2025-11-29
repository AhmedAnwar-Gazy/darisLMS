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
        // Stores the link associated with a custom link communication instance.
        Schema::create('communication_customlink', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('commid')->comment('ID of the communication record');
            $table->string('url', 255)->nullable()->comment('URL being linked to by the provider');

            // Foreign Keys
            $table->foreign('commid')->references('id')->on('communication');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_customlink');
    }
};
