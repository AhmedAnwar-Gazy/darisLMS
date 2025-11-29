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
        // Data for the customisable user fields
        Schema::create('user_info_data', function (Blueprint $table) {
            $table->id('id');
            $table->integer('userid')->default(0)->comment('id from the user table');
            $table->integer('fieldid')->default(0)->comment('id from the field table');
            $table->text('data')->comment('Field data');
            $table->tinyInteger('dataformat')->default(0);

            // Unique Indexes
            $table->unique(['userid', 'fieldid'], 'userfieldidx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info_data');
    }
};
