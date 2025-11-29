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
        // Payment accounts
        Schema::create('payment_accounts', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->string('idnumber', 100)->nullable();
            $table->unsignedBigInteger('contextid');
            $table->boolean('enabled')->default(0);
            $table->boolean('archived')->default(0);
            $table->integer('timecreated')->nullable();
            $table->integer('timemodified')->nullable();

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_accounts');
    }
};
