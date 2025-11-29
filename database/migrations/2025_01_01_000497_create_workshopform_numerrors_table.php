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
        // The assessment dimensions definitions of Number of errors grading strategy forms
        Schema::create('workshopform_numerrors', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('workshopid')->comment('Workshop ID');
            $table->integer('sort')->nullable()->default(0)->comment('Defines the dimension order within the assessment form');
            $table->text('description')->nullable()->comment('The description of the dimension');
            $table->tinyInteger('descriptionformat')->nullable()->default(0)->comment('The format of the description field');
            $table->integer('descriptiontrust')->nullable();
            $table->string('grade0', 50)->nullable()->comment('The word describing the negative evaluation (like Poor, Missing, Absent, etc.). If NULL, it defaults to a translated string False');
            $table->string('grade1', 50)->nullable()->comment('A word for possitive evaluation (like Good, Present, OK etc). If NULL, it defaults to a translated string True');
            $table->smallInteger('weight')->nullable()->default(1)->comment('Weight of this dimension');

            // Foreign Keys
            $table->foreign('workshopid')->references('id')->on('workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopform_numerrors');
    }
};
