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
        // Stores the last time a successful MFA auth was registered for a userid
        Schema::create('tool_mfa_auth', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->comment('User id');
            $table->bigInteger('lastverified')->default(0)->comment('Timestamp of last MFA verification.');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_mfa_auth');
    }
};
