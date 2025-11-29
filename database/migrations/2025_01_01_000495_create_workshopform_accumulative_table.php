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
        // The assessment dimensions definitions of Accumulative grading strategy forms
        Schema::create('workshopform_accumulative', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('workshopid')->comment('Workshop ID');
            $table->integer('sort')->nullable()->default(0)->comment('Defines the dimension order within the assessment form');
            $table->text('description')->nullable()->comment('The description of the dimension');
            $table->tinyInteger('descriptionformat')->nullable()->default(0)->comment('The format of the description field');
            $table->integer('grade')->comment('If greater than 0, then the value is maximum grade on a scale 0..grade. If lesser than 0, then its absolute value is the id of a record in scale table. If equals 0, then no grading is possible for this dimension, just commenting.');
            $table->smallInteger('weight')->nullable()->default(1)->comment('The weigh of the dimension');

            // Foreign Keys
            $table->foreign('workshopid')->references('id')->on('workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopform_accumulative');
    }
};
