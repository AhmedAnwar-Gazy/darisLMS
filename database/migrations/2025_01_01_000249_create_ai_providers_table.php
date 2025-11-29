<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ai_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('provider', 255);
            $table->unsignedTinyInteger('enabled')->default(1);
            $table->text('config');
            $table->text('actionconfig')->nullable();
            
            $table->index('provider');
        });
    }
    public function down(): void { Schema::dropIfExists('ai_providers'); }
};
