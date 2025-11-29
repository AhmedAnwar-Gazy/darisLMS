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
        // hub where the site is registered on with their associated token
        Schema::create('registration_hubs', function (Blueprint $table) {
            $table->id('id');
            $table->string('token', 255)->comment('the token to communicate with the hub by web service');
            $table->string('hubname', 255);
            $table->string('huburl', 255);
            $table->boolean('confirmed')->default(0);
            $table->string('secret', 255)->nullable()->comment('the unique site identifier for this hub');
            $table->integer('timemodified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_hubs');
    }
};
