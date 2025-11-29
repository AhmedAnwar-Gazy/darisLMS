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
        // Table to represent a report filter/condition
        Schema::create('reportbuilder_filter', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('reportid')->default(0);
            $table->string('uniqueidentifier', 255);
            $table->string('heading', 255)->nullable();
            $table->boolean('iscondition')->default(0);
            $table->integer('filterorder');
            $table->unsignedBigInteger('usercreated')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Unique Indexes
            $table->unique(['reportid', 'uniqueidentifier', 'iscondition'], 'report-filter');

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
        Schema::dropIfExists('reportbuilder_filter');
    }
};
