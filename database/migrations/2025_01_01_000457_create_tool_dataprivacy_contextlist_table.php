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
        // List of contexts for a component
        Schema::create('tool_dataprivacy_contextlist', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 255)->comment('Frankenstyle component name');
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_dataprivacy_contextlist');
    }
};
