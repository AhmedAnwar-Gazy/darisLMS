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
        // Defines report audience
        Schema::create('reportbuilder_audience', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('reportid');
            $table->string('heading', 255)->nullable();
            $table->string('classname', 255);
            $table->text('configdata');
            $table->unsignedBigInteger('usercreated')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('reportid')->references('id')->on('reportbuilder_report');
            $table->foreign('usercreated')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportbuilder_audience');
    }
};
