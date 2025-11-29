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
        // Lists all the installed quiz reports and their display order and so on. No need to worry about deleting old records. Only records with an equivalent directory are displayed.
        Schema::create('quiz_reports', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->nullable()->comment('name of the report, same as the directory name');
            $table->integer('displayorder')->comment('display order for report tabs');
            $table->string('capability', 255)->nullable()->comment('Capability required to see this report. May be blank which means use the default of mod/quiz:viewreport. This is used when deciding which tabs to render.');

            // Unique Indexes
            $table->unique(['name'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_reports');
    }
};
