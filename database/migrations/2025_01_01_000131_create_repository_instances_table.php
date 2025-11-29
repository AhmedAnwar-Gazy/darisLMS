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
        // This table contains one entry for every configured external repository instance.
        Schema::create('repository_instances', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->integer('typeid');
            $table->unsignedBigInteger('userid')->default(0);
            $table->unsignedBigInteger('contextid');
            $table->string('username', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->integer('timecreated')->nullable();
            $table->integer('timemodified')->nullable();
            $table->boolean('readonly')->default(0);

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repository_instances');
    }
};
