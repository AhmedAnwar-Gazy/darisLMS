<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ai_action_explain_text', function (Blueprint $table) {
            $table->id();
            $table->text('prompt')->nullable();
            $table->string('responseid', 128)->nullable();
            $table->string('fingerprint', 128)->nullable();
            $table->text('generatedcontent')->nullable();
            $table->string('finishreason', 128)->nullable();
            $table->unsignedBigInteger('prompttokens')->nullable();
            $table->unsignedBigInteger('completiontoken')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('ai_action_explain_text'); }
};
