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
        // Queued records to initiate new processing of specific targets
        Schema::create('tool_brickfield_process', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid');
            $table->string('item', 64)->nullable()->comment('The item for process action.');
            $table->integer('contextid')->nullable();
            $table->integer('innercontextid')->nullable();
            $table->bigInteger('timecreated')->nullable();
            $table->bigInteger('timecompleted')->nullable();

            // Indexes
            $table->index(['timecompleted'], 'timecompleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_brickfield_process');
    }
};
