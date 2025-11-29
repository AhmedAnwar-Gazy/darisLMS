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
        // Defines criteria that were met for an issued badge
        Schema::create('badge_criteria_met', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('issuedid')->nullable();
            $table->unsignedBigInteger('critid');
            $table->unsignedBigInteger('userid');
            $table->integer('datemet');

            // Foreign Keys
            $table->foreign('critid')->references('id')->on('badge_criteria');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('issuedid')->references('id')->on('badge_issued');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_criteria_met');
    }
};
