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
        // moodle roles
        Schema::create('role', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->comment('Empty names are automatically localised');
            $table->string('shortname', 100);
            $table->text('description')->comment('Empty descriptions may be automatically localised');
            $table->integer('sortorder')->default(0);
            $table->string('archetype', 30)->comment('Role archetype is used during install and role reset, marks admin role and helps in site settings');

            // Unique Indexes
            $table->unique(['sortorder'], 'sortorder');
            $table->unique(['shortname'], 'shortname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
