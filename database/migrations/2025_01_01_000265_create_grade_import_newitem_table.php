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
        // temporary table for storing new grade_item names from grade import
        Schema::create('grade_import_newitem', function (Blueprint $table) {
            $table->id('id');
            $table->string('itemname', 255)->comment('new grade item name');
            $table->integer('importcode')->comment('import batch code for identification');
            $table->unsignedBigInteger('importer')->comment('user importing the data');

            // Foreign Keys
            $table->foreign('importer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_import_newitem');
    }
};
