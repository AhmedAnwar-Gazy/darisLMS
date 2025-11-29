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
        // Customisable fields categories
        Schema::create('user_info_category', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->comment('Category name');
            $table->integer('sortorder')->default(0)->comment('Display order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info_category');
    }
};
