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
        // Default comment for the table, please edit me
        Schema::create('badge_backpack_oauth2', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('issuerid');
            $table->unsignedBigInteger('externalbackpackid');
            $table->text('token');
            $table->text('refreshtoken');
            $table->integer('expires')->nullable();
            $table->text('scope')->nullable();

            // Foreign Keys
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('issuerid')->references('id')->on('oauth2_issuer');
            $table->foreign('externalbackpackid')->references('id')->on('badge_external_backpack');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_backpack_oauth2');
    }
};
