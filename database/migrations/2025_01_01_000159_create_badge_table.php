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
        // Defines badge
        Schema::create('badge', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);
            $table->unsignedBigInteger('usercreated');
            $table->unsignedBigInteger('usermodified');
            $table->string('issuername', 255);
            $table->string('issuerurl', 255);
            $table->string('issuercontact', 255)->nullable();
            $table->integer('expiredate')->nullable();
            $table->integer('expireperiod')->nullable();
            $table->boolean('type')->default(1)->comment('1 = site, 2 = course');
            $table->unsignedBigInteger('courseid')->nullable();
            $table->text('message');
            $table->text('messagesubject');
            $table->boolean('attachment')->default(1)->comment('Attach baked badge for download');
            $table->boolean('notification')->default(1)->comment('Message when badge is awarded');
            $table->boolean('status')->default(0)->comment('Badge status: 0 = inactive, 1 = active, 2 = active+locked, 3 = inactive+locked, 4 = archived');
            $table->integer('nextcron')->nullable();
            $table->string('version', 255)->nullable();
            $table->string('language', 255)->nullable();
            $table->string('imageauthorname', 255)->nullable();
            $table->string('imageauthoremail', 255)->nullable();
            $table->string('imageauthorurl', 255)->nullable();
            $table->text('imagecaption')->nullable();

            // Indexes
            $table->index(['type'], 'type');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('usermodified')->references('id')->on('users');
            $table->foreign('usercreated')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge');
    }
};
