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
        // enrol_flatfile table retrofitted from MySQL
        Schema::create('enrol_flatfile', function (Blueprint $table) {
            $table->id('id');
            $table->string('action', 30);
            $table->unsignedBigInteger('roleid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('courseid');
            $table->integer('timestart')->default(0);
            $table->integer('timeend')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('roleid')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_flatfile');
    }
};
