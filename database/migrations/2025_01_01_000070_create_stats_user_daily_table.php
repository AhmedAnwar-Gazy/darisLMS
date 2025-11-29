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
        // To accumulate daily stats per course/user
        Schema::create('stats_user_daily', function (Blueprint $table) {
            $table->id('id');
            $table->integer('courseid')->default(0);
            $table->integer('userid')->default(0);
            $table->integer('roleid')->default(0);
            $table->integer('timeend')->default(0);
            $table->integer('statsreads')->default(0);
            $table->integer('statswrites')->default(0);
            $table->string('stattype', 30);

            // Indexes
            $table->index(['courseid'], 'courseid');
            $table->index(['userid'], 'userid');
            $table->index(['roleid'], 'roleid');
            $table->index(['timeend'], 'timeend');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats_user_daily');
    }
};
