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
        // A rotating log of hashes of previously used passwords for each user.
        Schema::create('user_password_history', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->string('hash', 255);
            $table->integer('timecreated');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_password_history');
    }
};
