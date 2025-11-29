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
        // Table to store factor secrets
        Schema::create('tool_mfa_secrets', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid');
            $table->string('factor', 100);
            $table->text('secret');
            $table->bigInteger('timecreated');
            $table->bigInteger('expiry');
            $table->boolean('revoked')->default(0);
            $table->string('sessionid', 100)->nullable();

            // Indexes
            $table->index(['factor'], 'factor');
            $table->index(['expiry'], 'expiry');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_mfa_secrets');
    }
};
