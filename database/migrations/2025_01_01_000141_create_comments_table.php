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
        // moodle comments module
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id');
            $table->integer('contextid');
            $table->string('component', 255)->nullable()->comment('The plugin this comment belongs to.');
            $table->string('commentarea', 255);
            $table->integer('itemid');
            $table->text('content');
            $table->tinyInteger('format')->default(0);
            $table->unsignedBigInteger('userid');
            $table->integer('timecreated');

            // Indexes
            $table->index(['contextid', 'commentarea', 'itemid'], 'ix_concomitem');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
