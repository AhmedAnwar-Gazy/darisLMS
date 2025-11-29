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
        // Association table joining requests and contextlists
        Schema::create('tool_dataprivacy_rqst_ctxlst', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('requestid');
            $table->unsignedBigInteger('contextlistid');

            // Unique Indexes
            $table->unique(['requestid', 'contextlistid'], 'requestidcontextlistid');

            // Foreign Keys
            $table->foreign('requestid')->references('id')->on('tool_dataprivacy_request');
            $table->foreign('contextlistid')->references('id')->on('tool_dataprivacy_contextlist');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_rqst_ctxlst');
    }
};
