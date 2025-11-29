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
        // To accumulate weekly stats
        Schema::create('stats_weekly', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->default(0);
            $table->integer('timeend')->default(0);
            $table->integer('roleid')->default(0)->comment('id of role for the aggregates');
            $table->string('stattype', 20)->default('activity')->comment('type of stat');
            $table->integer('stat1')->default(0)->comment('stat1. usually used for reads');
            $table->integer('stat2')->default(0)->comment('stat2. usually used for writes.');

            // Indexes
            $table->index(['courseid'], 'courseid');
            $table->index(['timeend'], 'timeend');
            $table->index(['roleid'], 'roleid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats_weekly');
    }
};
