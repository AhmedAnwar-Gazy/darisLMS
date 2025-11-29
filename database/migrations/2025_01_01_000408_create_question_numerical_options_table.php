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
        // Options for questions of type numerical This table is also used by the calculated question type
        Schema::create('question_numerical_options', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('question')->default(0);
            $table->smallInteger('showunits')->default(0)->comment('How units are handled: 3) Not used at all, 0) Optional, or 1) must be right or penalty applied.');
            $table->smallInteger('unitsleft')->default(0)->comment('display the unit at left as in $1.00');
            $table->smallInteger('unitgradingtype')->default(0)->comment('0 no penalty, 1 fraction response grade, 2 fraction total grade');
            $table->decimal('unitpenalty', 12, 7)->default(0.1)->comment('Penalty for getting the unit wrong, when they are being graded.');

            // Foreign Keys
            $table->foreign('question')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_numerical_options');
    }
};
