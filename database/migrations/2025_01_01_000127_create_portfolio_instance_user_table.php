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
        // user data for portfolio instances.
        Schema::create('portfolio_instance_user', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('instance')->comment('fk to instance table');
            $table->unsignedBigInteger('userid')->comment('fk to user table');
            $table->string('name', 255)->comment('name of config item');
            $table->text('value')->nullable()->comment('value of config item');

            // Foreign Keys
            $table->foreign('instance')->references('id')->on('portfolio_instance');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_instance_user');
    }
};
