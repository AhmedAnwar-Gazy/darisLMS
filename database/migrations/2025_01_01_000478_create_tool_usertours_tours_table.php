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
        // List of tours
        Schema::create('tool_usertours_tours', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->comment('Name of the user tour');
            $table->text('description')->nullable();
            $table->string('pathmatch', 255)->nullable();
            $table->boolean('enabled')->default(0);
            $table->integer('sortorder')->default(0);
            $table->string('endtourlabel', 255)->nullable()->comment('Custom label for the end tour button');
            $table->text('configdata');
            $table->boolean('displaystepnumbers')->default(0)->comment('Setting to display step numbers of the tour');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_usertours_tours');
    }
};
