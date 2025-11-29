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
        // Defines criteria for issuing badges
        Schema::create('badge_criteria', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('badgeid')->default(0);
            $table->integer('criteriatype')->nullable()->comment('The criteria type we are aggregating');
            $table->boolean('method')->default(1)->comment('1 = all, 2 = any');
            $table->text('description')->nullable();
            $table->tinyInteger('descriptionformat')->default(0);

            // Indexes
            $table->index(['criteriatype'], 'criteriatype');

            // Unique Indexes
            $table->unique(['badgeid', 'criteriatype'], 'badgecriteriatype');

            // Foreign Keys
            $table->foreign('badgeid')->references('id')->on('badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_criteria');
    }
};
