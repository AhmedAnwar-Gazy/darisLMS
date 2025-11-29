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
        // Temporary table for importing grades
        Schema::create('grade_import_values', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('itemid')->nullable()->comment('if set, this points to existing grade_items id');
            $table->unsignedBigInteger('newgradeitem')->nullable()->comment('if set, points to the id of grade_import_newitem');
            $table->unsignedBigInteger('userid');
            $table->decimal('finalgrade', 10, 5)->nullable()->comment('raw grade value');
            $table->text('feedback')->nullable();
            $table->integer('importcode')->comment('similar to backup_code, a unique batch code for identifying one batch of imports');
            $table->unsignedBigInteger('importer')->nullable();
            $table->boolean('importonlyfeedback')->nullable()->default(0);

            // Foreign Keys
            $table->foreign('itemid')->references('id')->on('grade_items');
            $table->foreign('newgradeitem')->references('id')->on('grade_import_newitem');
            $table->foreign('importer')->references('id')->on('users');
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_import_values');
    }
};
