<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sms_messages', function (Blueprint $table) {
            $table->id();
            $table->string('recipientnumber', 30);
            $table->text('content')->nullable();
            $table->string('component', 100);
            $table->string('messagetype', 100);
            $table->unsignedBigInteger('recipientuserid')->nullable();
            $table->unsignedTinyInteger('issensitive')->default(0);
            $table->unsignedBigInteger('gatewayid')->nullable();
            $table->string('status', 100)->nullable();
            $table->unsignedBigInteger('timecreated');
            
            $table->foreign('gatewayid')->references('id')->on('sms_gateways');
        });
    }
    public function down(): void { Schema::dropIfExists('sms_messages'); }
};
