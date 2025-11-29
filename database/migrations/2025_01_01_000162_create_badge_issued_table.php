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
        // Defines issued badges
        Schema::create('badge_issued', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('badgeid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->text('uniquehash');
            $table->integer('dateissued')->default(0);
            $table->integer('dateexpire')->nullable();
            $table->boolean('visible')->default(0);
            $table->integer('issuernotified')->nullable();

            // Unique Indexes
            $table->unique(['badgeid', 'userid'], 'badgeuser');

            // Foreign Keys
            $table->foreign('badgeid')->references('id')->on('badge');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_issued');
    }
};
