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
        // Table to store coursevisible setting for site tool on course level
        Schema::create('lti_coursevisible', function (Blueprint $table) {
            $table->id('id');
            $table->integer('typeid');
            $table->integer('courseid')->comment('Course ID');
            $table->boolean('coursevisible');

            // Indexes
            $table->index(['courseid'], 'courseid');
            $table->index(['typeid'], 'typeid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lti_coursevisible');
    }
};
