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
        // Changes done in server configuration through admin UI
        Schema::create('config_log', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->integer('timemodified');
            $table->string('plugin', 100)->nullable();
            $table->string('name', 100);
            $table->text('value')->nullable();
            $table->text('oldvalue')->nullable();

            // Indexes
            $table->index(['timemodified'], 'timemodified');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_log');
    }
};
