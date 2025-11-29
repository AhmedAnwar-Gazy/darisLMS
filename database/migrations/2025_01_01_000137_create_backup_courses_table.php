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
        // To store every course backup status
        Schema::create('backup_courses', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->default(0);
            $table->integer('laststarttime')->default(0);
            $table->integer('lastendtime')->default(0);
            $table->string('laststatus', 1)->default(5);
            $table->integer('nextstarttime')->default(0);

            // Unique Indexes
            $table->unique(['courseid'], 'courseid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_courses');
    }
};
