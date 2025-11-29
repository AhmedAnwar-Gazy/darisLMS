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
        // Defines endorsement for badge
        Schema::create('badge_endorsement', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('badgeid')->default(0);
            $table->string('issuername', 255);
            $table->string('issuerurl', 255);
            $table->string('issueremail', 255);
            $table->string('claimid', 255)->nullable();
            $table->text('claimcomment')->nullable();
            $table->integer('dateissued')->default(0);

            // Foreign Keys
            $table->foreign('badgeid')->references('id')->on('badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_endorsement');
    }
};
