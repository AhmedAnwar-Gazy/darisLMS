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
        // Setting of the display formats
        Schema::create('glossary_formats', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 50);
            $table->string('popupformatname', 50);
            $table->tinyInteger('visible')->default(1);
            $table->tinyInteger('showgroup')->default(1);
            $table->string('showtabs', 100)->nullable();
            $table->string('defaultmode', 50);
            $table->string('defaulthook', 50);
            $table->string('sortkey', 50);
            $table->string('sortorder', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary_formats');
    }
};
