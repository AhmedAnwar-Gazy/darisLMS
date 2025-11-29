<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sms_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('gateway', 255);
            $table->unsignedTinyInteger('enabled')->default(1);
            $table->text('config');
        });
    }
    public function down(): void { Schema::dropIfExists('sms_gateways'); }
};
