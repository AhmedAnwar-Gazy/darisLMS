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
        // Course completion aggregation methods for criteria
        Schema::create('course_completion_aggr_methd', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->integer('criteriatype')->nullable()->comment('The criteria type we are aggregating, or NULL if complete course aggregation');
            $table->boolean('method')->default(0)->comment('1 = all, 2 = any, 3 = fraction, 4 = unit');
            $table->decimal('value', 10, 5)->nullable()->comment('NULL = all/any, 0..1 for method \'fraction\', > 0 for method \'unit\'');

            // Indexes
            $table->index(['course'], 'course');
            $table->index(['criteriatype'], 'criteriatype');

            // Unique Indexes
            $table->unique(['course', 'criteriatype'], 'coursecriteriatype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_completion_aggr_methd');
    }
};
