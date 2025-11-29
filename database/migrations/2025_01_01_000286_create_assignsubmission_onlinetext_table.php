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
        // Info about onlinetext submission
        Schema::create('assignsubmission_onlinetext', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('assignment')->default(0);
            $table->unsignedBigInteger('submission')->default(0);
            $table->text('onlinetext')->nullable()->comment('The text for this online text submission.');
            $table->smallInteger('onlineformat')->default(0)->comment('The format for this online text submission.');

            // Foreign Keys
            $table->foreign('assignment')->references('id')->on('assign');
            $table->foreign('submission')->references('id')->on('assign_submission');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignsubmission_onlinetext');
    }
};
