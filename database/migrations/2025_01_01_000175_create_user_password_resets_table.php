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
        // table tracking password reset confirmation tokens
        Schema::create('user_password_resets', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->comment('id of the user account which requester claimed to be');
            $table->integer('timerequested')->comment('The time that the user first requested this password reset');
            $table->integer('timererequested')->default(0)->comment('The time the user re-requested the password reset.');
            $table->string('token', 32)->comment('secret set and emailed to user');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_password_resets');
    }
};
