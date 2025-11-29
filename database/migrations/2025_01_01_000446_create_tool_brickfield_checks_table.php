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
        // Checks details
        Schema::create('tool_brickfield_checks', function (Blueprint $table) {
            $table->id('id');
            $table->string('checktype', 64)->nullable();
            $table->string('shortname', 64)->nullable();
            $table->bigInteger('checkgroup')->nullable()->default(0)->comment('The group category identifier.');
            $table->smallInteger('status');
            $table->tinyInteger('severity')->default(0);

            // Indexes
            $table->index(['checktype'], 'checktype');
            $table->index(['checkgroup'], 'checkgroup');
            $table->index(['status'], 'status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_checks');
    }
};
