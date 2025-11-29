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
        // Stores information about which filters are active in which contexts. Also the filter sort order. See get_active_filters in lib/filterlib.php for how this data is used.
        Schema::create('filter_active', function (Blueprint $table) {
            $table->id('id');
            $table->string('filter', 32)->comment('The filter internal name, like \'tex\'.');
            $table->unsignedBigInteger('contextid')->comment('References context.id.');
            $table->smallInteger('active')->comment('Whether this filter is active in this context. +1 = On, -1 = Off, no row with this contextid = inherit. As a special case, when contextid points to the system context, -9999 means this filter is completely disabled.');
            $table->integer('sortorder')->default(0)->comment('Only relevant if contextid points to the system context. In other cases this field should contain 0. The order in which the filters should be applied.');

            // Unique Indexes
            $table->unique(['contextid', 'filter'], 'contextid-filter');

            // Foreign Keys
            $table->foreign('contextid')->references('id')->on('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_active');
    }
};
