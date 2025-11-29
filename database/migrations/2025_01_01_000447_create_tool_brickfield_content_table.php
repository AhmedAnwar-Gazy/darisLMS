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
        // Content of an area at a particular time (recognised by a hash)
        Schema::create('tool_brickfield_content', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('areaid');
            $table->string('contenthash', 40);
            $table->boolean('iscurrent')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0 - needs checking, -1 in progress, 1 checked');
            $table->integer('timecreated');
            $table->integer('timechecked')->nullable();

            // Indexes
            $table->index(['status'], 'status');
            $table->index(['iscurrent', 'areaid'], 'iscurrent');

            // Foreign Keys
            $table->foreign('areaid')->references('id')->on('tool_brickfield_areas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_content');
    }
};
