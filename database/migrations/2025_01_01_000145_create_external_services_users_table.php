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
        // users allowed to use services with restricted users flag
        Schema::create('external_services_users', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('externalserviceid');
            $table->unsignedBigInteger('userid');
            $table->string('iprestriction', 255)->nullable()->comment('ip restriction');
            $table->integer('validuntil')->nullable()->comment('timestampt - valid until data');
            $table->integer('timecreated')->nullable()->comment('created timestamp');

            // Foreign Keys
            $table->foreign('externalserviceid')->references('id')->on('external_services');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_services_users');
    }
};
