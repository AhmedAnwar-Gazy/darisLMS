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
        Schema::create('gradepenalty_duedate_rule', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('contextid');
            $table->bigInteger('sortorder')->default(0);
            $table->bigInteger('overdueby');
            $table->float('penalty');
            $table->bigInteger('usermodified')->default(0);
            $table->bigInteger('timecreated')->default(0);
            $table->bigInteger('timemodified')->default(0);

            // Indexes
            $table->index(['contextid'], 'gradduedrule_con_ix');
            $table->index(['usermodified'], 'gradduedrule_use_ix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradepenalty_duedate_rule');
    }
};
