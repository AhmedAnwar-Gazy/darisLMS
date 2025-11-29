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
        // Logged database queries.
        Schema::create('log_queries', function (Blueprint $table) {
            $table->id('id');
            $table->smallInteger('qtype')->comment('query type constant');
            $table->text('sqltext')->comment('query sql');
            $table->text('sqlparams')->nullable()->comment('query parameters');
            $table->smallInteger('error')->default(0)->comment('is error');
            $table->text('info')->nullable()->comment('detailed info such as error text');
            $table->text('backtrace')->nullable()->comment('php execution trace');
            $table->decimal('exectime', 10, 5)->comment('query execution time in seconds as float');
            $table->integer('timelogged')->comment('timestamp when log info stored into db');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_queries');
    }
};
