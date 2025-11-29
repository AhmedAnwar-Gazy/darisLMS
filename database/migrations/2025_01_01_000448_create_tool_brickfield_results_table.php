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
        // Results of the accessibility checks
        Schema::create('tool_brickfield_results', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contentid')->nullable();
            $table->unsignedBigInteger('checkid');
            $table->integer('errorcount')->default(0);

            // Indexes
            $table->index(['contentid', 'checkid'], 'areacheck');

            // Foreign Keys
            $table->foreign('contentid')->references('id')->on('tool_brickfield_content');
            $table->foreign('checkid')->references('id')->on('tool_brickfield_checks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_results');
    }
};
