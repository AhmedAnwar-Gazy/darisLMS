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
        // Records MoodleNet share progress
        Schema::create('moodlenet_share_progress', function (Blueprint $table) {
            $table->id('id');
            $table->tinyInteger('type');
            $table->integer('courseid');
            $table->integer('cmid')->nullable();
            $table->integer('userid');
            $table->integer('timecreated');
            $table->string('resourceurl', 255)->nullable();
            $table->tinyInteger('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moodlenet_share_progress');
    }
};
