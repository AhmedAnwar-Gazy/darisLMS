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
        // Stores information about payments
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id');
            $table->string('component', 100)->comment('The plugin this payment belongs to.');
            $table->string('paymentarea', 50)->comment('The name of payable area');
            $table->integer('itemid');
            $table->unsignedBigInteger('userid');
            $table->string('amount', 20);
            $table->string('currency', 3);
            $table->unsignedBigInteger('accountid');
            $table->string('gateway', 100);
            $table->integer('timecreated')->default(0);
            $table->integer('timemodified')->default(0);

            // Indexes
            $table->index(['gateway'], 'gateway');
            $table->index(['component', 'paymentarea', 'itemid'], 'component-paymentarea-itemid');

            // Foreign Keys
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('accountid')->references('id')->on('payment_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
