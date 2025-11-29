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
        // Attributes of the applied items
        Schema::create('adminpresets_app_it_a', function (Blueprint $table) {
            $table->id('id');
            $table->integer('adminpresetapplyid');
            $table->integer('configlogid');
            $table->string('itemname', 100)->nullable()->comment('Necessary to rollback');

            // Indexes
            $table->index(['configlogid'], 'configlogid');
            $table->index(['adminpresetapplyid'], 'adminpresetapplyid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpresets_app_it_a');
    }
};
