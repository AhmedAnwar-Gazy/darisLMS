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
        // list of all external functions
        Schema::create('external_functions', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 200);
            $table->string('classname', 100);
            $table->string('methodname', 100);
            $table->string('classpath', 255)->nullable();
            $table->string('component', 100);
            $table->string('capabilities', 255)->nullable()->comment('all capabilities that are required to be run by the function (separated by comma)');
            $table->text('services')->nullable()->comment('all the services (by shortname) where this function must be included');

            // Unique Indexes
            $table->unique(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_functions');
    }
};
