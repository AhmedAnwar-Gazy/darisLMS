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
        // maps mahara tokens to transfer ids
        Schema::create('portfolio_mahara_queue', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('transferid')->comment('fk to portfolio_tempdata.id');
            $table->string('token', 50)->comment('the token mahara sent us to use for this transfer.');

            // Indexes
            $table->index(['token'], 'tokenidx');

            // Foreign Keys
            $table->foreign('transferid')->references('id')->on('portfolio_tempdata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_mahara_queue');
    }
};
