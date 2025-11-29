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
        // Used by build_context_path() in upgrade and cron to keep context depths and paths in sync.
        Schema::create('context_temp', function (Blueprint $table) {
            $table->integer('id')->comment('This id isn\'t autonumeric/sequence. It\'s the context->id');
            $table->string('path', 255);
            $table->tinyInteger('depth');
            $table->tinyInteger('locked')->default(0)->comment('Whether this context and its children are locked');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('context_temp');
    }
};
