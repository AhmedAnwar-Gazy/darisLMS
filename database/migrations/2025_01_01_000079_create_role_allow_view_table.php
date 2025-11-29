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
        // This table stores which which other roles a user is allowed to view to if they have one role.
        Schema::create('role_allow_view', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('roleid')->comment('The role the user has.');
            $table->unsignedBigInteger('allowview')->comment('The id of a role that the user is allowed to view to as a result of having this role.');

            // Unique Indexes
            $table->unique(['roleid', 'allowview'], 'roleid-allowview');

            // Foreign Keys
            $table->foreign('roleid')->references('id')->on('role');
            $table->foreign('allowview')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_allow_view');
    }
};
