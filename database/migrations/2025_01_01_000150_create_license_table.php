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
        // store licenses used by moodle
        Schema::create('license', function (Blueprint $table) {
            $table->id('id');
            $table->string('shortname', 255)->nullable();
            $table->text('fullname')->nullable();
            $table->string('source', 255)->nullable();
            $table->boolean('enabled')->default(1);
            $table->integer('version')->default(0);
            $table->boolean('custom')->default(0)->comment('If this flag is set, license is custom and can be updated or deleted, otherwise license is a core license and cannot be edited.');
            $table->smallInteger('sortorder')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license');
    }
};
