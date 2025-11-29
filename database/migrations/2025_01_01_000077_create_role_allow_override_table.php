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
        // this defines what role can override what role
        Schema::create('role_allow_override', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('roleid')->default(0);
            $table->unsignedBigInteger('allowoverride')->default(0);

            // Unique Indexes
            $table->unique(['roleid', 'allowoverride'], 'roleid-allowoverride');

            // Foreign Keys
            $table->foreign('roleid')->references('id')->on('role');
            $table->foreign('allowoverride')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_allow_override');
    }
};
