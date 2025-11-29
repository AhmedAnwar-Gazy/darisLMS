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
        // A contextlist context item
        Schema::create('tool_dataprivacy_ctxlst_ctx', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextid');
            $table->unsignedBigInteger('contextlistid');
            $table->tinyInteger('status')->default(0)->comment('Approval status of the context item');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Foreign Keys
            $table->foreign('contextlistid')->references('id')->on('tool_dataprivacy_contextlist');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_ctxlst_ctx');
    }
};
