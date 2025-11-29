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
        // The assessment dimensions definitions of Comments strategy forms
        Schema::create('workshopform_comments', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('workshopid')->comment('Workshop ID');
            $table->integer('sort')->nullable()->default(0)->comment('Defines the dimension order within the assessment form');
            $table->text('description')->nullable()->comment('The description of the dimension');
            $table->tinyInteger('descriptionformat')->nullable()->default(0)->comment('The format of the description field');

            // Foreign Keys
            $table->foreign('workshopid')->references('id')->on('workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopform_comments');
    }
};
