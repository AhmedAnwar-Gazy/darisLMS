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
        // Stores PayPal related information
        Schema::create('paygw_paypal', function (Blueprint $table) {
            $table->id('id');
            $table->integer('paymentid');
            $table->string('pp_orderid', 255)->default('The ID of the order in PayPal');

            // Unique Indexes
            $table->unique(['paymentid'], 'paymentid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paygw_paypal');
    }
};
