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
        // the content introduced in each record/fields
        Schema::create('data_content', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('fieldid')->default(0);
            $table->unsignedBigInteger('recordid')->default(0);
            $table->text('content')->nullable();
            $table->text('content1')->nullable();
            $table->text('content2')->nullable();
            $table->text('content3')->nullable();
            $table->text('content4')->nullable();

            // Foreign Keys
            $table->foreign('recordid')->references('id')->on('data_records');
            $table->foreign('fieldid')->references('id')->on('data_fields');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_content');
    }
};
