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
        // Data purposes
        Schema::create('tool_dataprivacy_purpose', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->boolean('descriptionformat')->nullable();
            $table->text('lawfulbases')->comment('Comma-separated IDs matching records in tool_dataprivacy_lawfulbasis');
            $table->text('sensitivedatareasons')->nullable()->comment('Comma-separated IDs matching records in tool_dataprivacy_sensitive');
            $table->string('retentionperiod', 255);
            $table->boolean('protected')->nullable();
            $table->integer('usermodified');
            $table->integer('timecreated');
            $table->integer('timemodified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_purpose');
    }
};
