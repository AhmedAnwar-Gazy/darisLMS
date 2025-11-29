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
        // every record introduced
        Schema::create('data_records', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0);
            $table->integer('groupid')->default(0);
            $table->unsignedBigInteger('dataid')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->smallInteger('approved')->default(0);

            // Foreign Keys
            $table->foreign('dataid')->references('id')->on('data');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_records');
    }
};
