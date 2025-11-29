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
        // Stores the allocation settings for the scheduled allocator
        Schema::create('workshopallocation_scheduled', function (Blueprint $table) {
            $table->id('id');
            $table->integer('workshopid')->comment('workshop id we are part of');
            $table->tinyInteger('enabled')->default(0)->comment('Is the scheduled allocation enabled');
            $table->integer('submissionend')->comment('What was the workshop\'s submissionend when this record was created or modified');
            $table->integer('timeallocated')->nullable()->comment('When was the last scheduled allocation executed');
            $table->text('settings')->nullable()->comment('The pre-defined settings for the underlying random allocation to run it with');
            $table->integer('resultstatus')->nullable()->comment('The resulting status of the most recent execution');
            $table->text('resultmessage')->nullable()->comment('Optional short message describing the resulting status');
            $table->text('resultlog')->nullable()->comment('The log of the most recent execution');

            // Unique Indexes
            $table->unique(['workshopid'], 'fkuq_workshopid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopallocation_scheduled');
    }
};
