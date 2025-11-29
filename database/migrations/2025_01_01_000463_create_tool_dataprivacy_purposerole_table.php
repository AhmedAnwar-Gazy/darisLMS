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
        // Data purpose overrides for a specific role
        Schema::create('tool_dataprivacy_purposerole', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('purposeid');
            $table->unsignedBigInteger('roleid');
            $table->text('lawfulbases')->nullable();
            $table->text('sensitivedatareasons')->nullable();
            $table->string('retentionperiod', 255);
            $table->boolean('protected')->nullable();
            $table->unsignedBigInteger('usermodified');
            $table->integer('timecreated');
            $table->integer('timemodified');

            // Unique Indexes
            $table->unique(['purposeid', 'roleid'], 'purposerole');

            // Foreign Keys
            $table->foreign('purposeid')->references('id')->on('tool_dataprivacy_purpose');
            $table->foreign('roleid')->references('id')->on('role');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_purposerole');
    }
};
