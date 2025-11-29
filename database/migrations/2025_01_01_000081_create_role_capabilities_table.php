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
        // permission has to be signed, overriding a capability for a particular role in a particular context
        Schema::create('role_capabilities', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('contextid')->default(0);
            $table->unsignedBigInteger('roleid')->default(0);
            $table->string('capability', 255);
            $table->integer('permission')->default(0);
            $table->integer('timemodified')->default(0);
            $table->unsignedBigInteger('modifierid')->default(0);

            // Unique Indexes
            $table->unique(['roleid', 'contextid', 'capability'], 'roleid-contextid-capability');

            // Foreign Keys
            $table->foreign('roleid')->references('id')->on('role');
            $table->foreign('contextid')->references('id')->on('context');
            $table->foreign('modifierid')->references('id')->on('users');
            $table->foreign('capability')->references('name')->on('capabilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_capabilities');
    }
};
