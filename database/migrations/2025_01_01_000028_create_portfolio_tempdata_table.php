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
        // stores temporary data for portfolio exports. the id of this table is used for the itemid for the temporary files area.  cron can clean up stale records (and associated file data) after expirytime.
        Schema::create('portfolio_tempdata', function (Blueprint $table) {
            $table->id('id');
            $table->text('data')->nullable()->comment('dumping ground for portfolio callers to store their data in.');
            $table->integer('expirytime')->comment('time this record will expire (used for cron cleanups) - the start of export + 24 hours');
            $table->unsignedBigInteger('userid')->comment('psuedo fk to user.  this is stored in the serialised data structure in the data field, but added here for ease of lookups.');
            $table->unsignedBigInteger('instance')->nullable()->default(0)->comment('which portfolio plugin instance is being used');
            $table->boolean('queued')->default(0)->comment('Value 1 means the entry should be processed in cron.');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('instance')->references('id')->on('portfolio_instance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_tempdata');
    }
};
