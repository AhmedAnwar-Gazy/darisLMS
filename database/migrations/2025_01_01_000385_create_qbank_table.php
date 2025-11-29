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
        Schema::create('qbank', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('course');
            $table->string('name', 1333)->default('');
            $table->bigInteger('timecreated')->default(0);
            $table->bigInteger('timemodified')->default(0);
            $table->text('intro')->nullable();
            $table->smallInteger('introformat')->default(0);
            $table->string('type', 40)->default('');

            // Indexes
            $table->index(['course'], 'qban_cou_ix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qbank');
    }
};
