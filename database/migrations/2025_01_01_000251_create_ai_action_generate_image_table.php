<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ai_action_generate_image', function (Blueprint $table) {
            $table->id();
            $table->text('prompt')->nullable();
            $table->unsignedBigInteger('numberimages');
            $table->string('quality', 21);
            $table->string('aspectratio', 20)->nullable();
            $table->string('style', 20)->nullable();
            $table->text('sourceurl')->nullable();
            $table->text('revisedprompt')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('ai_action_generate_image'); }
};
