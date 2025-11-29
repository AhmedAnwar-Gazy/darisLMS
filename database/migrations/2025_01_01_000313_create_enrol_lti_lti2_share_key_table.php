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
        // Resource link share key
        Schema::create('enrol_lti_lti2_share_key', function (Blueprint $table) {
            $table->id('id');
            $table->string('sharekey', 32);
            $table->bigInteger('resourcelinkid');
            $table->boolean('autoapprove');
            $table->integer('expires');

            // Unique Indexes
            $table->unique(['sharekey'], 'sharekey');
            $table->unique(['resourcelinkid'], 'resourcelinkid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_lti_lti2_share_key');
    }
};
