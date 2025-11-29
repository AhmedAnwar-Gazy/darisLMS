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
        // Table for data requests
        Schema::create('tool_dataprivacy_request', function (Blueprint $table) {
            $table->id('id');
            $table->integer('type')->default(0)->comment('Data request type');
            $table->text('comments')->nullable()->comment('More details about the request');
            $table->tinyInteger('commentsformat')->default(0);
            $table->unsignedBigInteger('userid')->default(0)->comment('The user ID the request is being made for');
            $table->unsignedBigInteger('requestedby')->default(0)->comment('The user ID of the one making the request');
            $table->tinyInteger('status')->default(0)->comment('The current status of the data request');
            $table->unsignedBigInteger('dpo')->nullable()->default(0)->comment('The user ID of the Data Protection Officer who is reviewing th request');
            $table->text('dpocomment')->nullable()->comment('DPO\'s comments (e.g. reason for rejecting the request, etc.)');
            $table->tinyInteger('dpocommentformat')->default(0);
            $table->smallInteger('systemapproved')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0)->comment('The user who created/modified this request object');
            $table->integer('timecreated')->default(0)->comment('The time this data request was created');
            $table->integer('timemodified')->default(0)->comment('The last time this data request was updated');
            $table->integer('creationmethod')->default(0)->comment('The type of the creation method of the data request');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('requestedby')->references('id')->on('users');
            $table->foreign('dpo')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_request');
    }
};
