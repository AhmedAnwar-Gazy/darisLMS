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
        // Stores teacher specified quicklist comments
        Schema::create('assignfeedback_editpdf_quick', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userid')->default(0);
            $table->text('rawtext');
            $table->integer('width')->default(120);
            $table->string('colour', 10)->nullable()->default('yellow');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignfeedback_editpdf_quick');
    }
};
