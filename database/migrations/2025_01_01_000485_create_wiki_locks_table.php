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
        // Manages page locks
        Schema::create('wiki_locks', function (Blueprint $table) {
            $table->id('id');
            $table->integer('pageid')->default(0)->comment('Locked page');
            $table->string('sectionname', 255)->nullable()->comment('locked page section');
            $table->integer('userid')->default(0)->comment('Locking user');
            $table->integer('lockedat')->default(0)->comment('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiki_locks');
    }
};
