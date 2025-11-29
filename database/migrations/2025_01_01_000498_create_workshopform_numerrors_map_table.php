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
        // This maps the number of errors to a percentual grade for submission
        Schema::create('workshopform_numerrors_map', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('workshopid')->comment('The id of the workshop');
            $table->integer('nonegative')->comment('Number of negative responses given by the reviewer');
            $table->decimal('grade', 10, 5)->comment('Percentual grade 0..100 for this number of negative responses');

            // Unique Indexes
            $table->unique(['workshopid', 'nonegative'], 'nonegative_uq');

            // Foreign Keys
            $table->foreign('workshopid')->references('id')->on('workshop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshopform_numerrors_map');
    }
};
