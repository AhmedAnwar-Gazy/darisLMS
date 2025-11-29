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
        // Communication user records mapping
        Schema::create('communication_user', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('commid')->comment('ID of the communication instance');
            $table->unsignedBigInteger('userid')->comment('ID of the moodle user to map with communication instance');
            $table->boolean('synced')->default(0)->comment('The user is synced or not');
            $table->boolean('deleted')->default(0)->comment('The user need to be deleted or not');

            // Foreign Keys
            $table->foreign('commid')->references('id')->on('communication');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_user');
    }
};
