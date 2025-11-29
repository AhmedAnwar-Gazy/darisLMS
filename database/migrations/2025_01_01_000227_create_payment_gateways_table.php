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
        // Configuration for one gateway for one payment account
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('accountid');
            $table->string('gateway', 100);
            $table->boolean('enabled')->default(1);
            $table->text('config')->nullable();
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Foreign Keys
            $table->foreign('accountid')->references('id')->on('payment_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
