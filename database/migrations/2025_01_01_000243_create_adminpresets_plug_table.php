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
        // Admin presets plugins status, to store information about whether they are enabled or not
        Schema::create('adminpresets_plug', function (Blueprint $table) {
            $table->id('id');
            $table->integer('adminpresetid');
            $table->string('plugin', 100)->nullable();
            $table->string('name', 100);
            $table->smallInteger('enabled')->default(0)->comment('Whether this plugins is currently enabled.');

            // Indexes
            $table->index(['adminpresetid'], 'adminpresetid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets_plug');
    }
};
