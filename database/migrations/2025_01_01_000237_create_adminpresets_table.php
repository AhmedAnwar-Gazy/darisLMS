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
        // Table to store presets data
        Schema::create('adminpresets', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid');
            $table->string('name', 255);
            $table->text('comments')->nullable();
            $table->string('site', 255);
            $table->string('author', 255)->nullable();
            $table->string('moodleversion', 20);
            $table->string('moodlerelease', 255);
            $table->boolean('iscore')->default(0)->comment('Whether this is a core preset or not, and which core preset');
            $table->integer('timecreated')->default(0);
            $table->integer('timeimported')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets');
    }
};
