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
        // Labels for markers to drag.
        Schema::create('qtype_ddmarker_drags', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid')->default(0);
            $table->integer('no')->default(0)->comment('drag no');
            $table->text('label')->comment('Alt text label for drag-able image.');
            $table->smallInteger('infinite')->default(0);
            $table->integer('noofdrags')->default(1)->comment('No of drag items, ignored if drag is infinite.');

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_ddmarker_drags');
    }
};
