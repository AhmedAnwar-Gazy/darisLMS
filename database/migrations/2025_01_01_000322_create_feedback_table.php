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
        // all feedbacks
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('id');
            $table->integer('course')->default(0);
            $table->string('name', 255);
            $table->text('intro');
            $table->smallInteger('introformat')->default(0);
            $table->boolean('anonymous')->default(1);
            $table->boolean('email_notification')->default(1);
            $table->boolean('multiple_submit')->default(1);
            $table->boolean('autonumbering')->default(1);
            $table->string('site_after_submit', 255);
            $table->text('page_after_submit');
            $table->tinyInteger('page_after_submitformat')->default(0);
            $table->boolean('publish_stats')->default(0);
            $table->integer('timeopen')->default(0);
            $table->integer('timeclose')->default(0);
            $table->integer('timemodified')->default(0);
            $table->boolean('completionsubmit')->default(0)->comment('If this field is set to 1, then the activity will be automatically marked as \'complete\' once the user submits their choice.');

            // Indexes
            $table->index(['course'], 'course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
