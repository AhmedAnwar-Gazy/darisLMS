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
        // Table to represent a report
        Schema::create('reportbuilder_report', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->nullable();
            $table->string('source', 255);
            $table->tinyInteger('type')->default(0);
            $table->boolean('uniquerows')->default(0);
            $table->text('conditiondata')->nullable();
            $table->text('settingsdata')->nullable();
            $table->unsignedBigInteger('contextid');
            $table->string('component', 100);
            $table->string('area', 100);
            $table->integer('itemid')->default(0);
            $table->unsignedBigInteger('usercreated')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('usercreated')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportbuilder_report');
    }
};
