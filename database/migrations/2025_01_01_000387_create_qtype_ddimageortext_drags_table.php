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
        // Images to drag. Actual file names are not stored here we use the file names as found in the file storage area.
        Schema::create('qtype_ddimageortext_drags', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('questionid')->default(0);
            $table->integer('no')->default(0)->comment('drag no');
            $table->integer('draggroup')->default(0);
            $table->smallInteger('infinite')->default(0);
            $table->text('label')->comment('Alt text label for drag-able image.');

            // Foreign Keys
            $table->foreign('questionid')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtype_ddimageortext_drags');
    }
};
