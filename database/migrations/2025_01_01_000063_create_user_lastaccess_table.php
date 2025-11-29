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
        // To keep track of course page access times, used in online participants block, and participants list
        Schema::create('user_lastaccess', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0);
            $table->integer('courseid')->default(0);
            $table->integer('timeaccess')->default(0);

            // Indexes
            $table->index(['userid'], 'userid');
            $table->index(['courseid'], 'courseid');

            // Unique Indexes
            $table->unique(['userid', 'courseid'], 'userid-courseid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lastaccess');
    }
};
