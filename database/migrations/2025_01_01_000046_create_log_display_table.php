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
        // For a particular module/action, specifies a moodle table/field
        Schema::create('log_display', function (Blueprint $table) {
            $table->id('id');
            $table->string('module', 20);
            $table->string('action', 40);
            $table->string('mtable', 30);
            $table->string('field', 200);
            $table->string('component', 100)->comment('owner of the log action');

            // Unique Indexes
            $table->unique(['module', 'action'], 'module-action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_display');
    }
};
