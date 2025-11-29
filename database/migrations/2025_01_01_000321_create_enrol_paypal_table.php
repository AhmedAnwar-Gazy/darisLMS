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
        // Holds all known information about PayPal transactions
        Schema::create('enrol_paypal', function (Blueprint $table) {
            $table->id('id');
            $table->string('business', 255);
            $table->string('receiver_email', 255);
            $table->string('receiver_id', 255);
            $table->string('item_name', 255);
            $table->unsignedBigInteger('courseid')->default(0);
            $table->unsignedBigInteger('userid')->default(0);
            $table->unsignedBigInteger('instanceid')->default(0);
            $table->string('memo', 255);
            $table->string('tax', 255);
            $table->string('option_name1', 255);
            $table->string('option_selection1_x', 255);
            $table->string('option_name2', 255);
            $table->string('option_selection2_x', 255);
            $table->string('payment_status', 255);
            $table->string('pending_reason', 255);
            $table->string('reason_code', 30);
            $table->string('txn_id', 255);
            $table->string('parent_txn_id', 255);
            $table->string('payment_type', 30);
            $table->integer('timeupdated')->default(0);

            // Indexes
            $table->index(['business'], 'business');
            $table->index(['receiver_email'], 'receiver_email');

            // Foreign Keys
            $table->foreign('courseid')->references('id')->on('course');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('instanceid')->references('id')->on('enrol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrol_paypal');
    }
};
