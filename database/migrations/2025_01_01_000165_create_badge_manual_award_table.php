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
        // Track manual award criteria for badges
        Schema::create('badge_manual_award', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('badgeid');
            $table->unsignedBigInteger('recipientid');
            $table->unsignedBigInteger('issuerid');
            $table->unsignedBigInteger('issuerrole');
            $table->integer('datemet');

            // Foreign Keys
            $table->foreign('badgeid')->references('id')->on('badge');
            $table->foreign('recipientid')->references('id')->on('users');
            $table->foreign('issuerid')->references('id')->on('users');
            $table->foreign('issuerrole')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_manual_award');
    }
};
