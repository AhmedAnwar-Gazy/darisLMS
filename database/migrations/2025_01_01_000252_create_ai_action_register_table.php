<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ai_action_register', function (Blueprint $table) {
            $table->id();
            $table->string('actionname', 100);
            $table->unsignedBigInteger('actionid');
            $table->unsignedTinyInteger('success')->default(0);
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('contextid');
            $table->string('provider', 100);
            $table->unsignedInteger('errorcode')->nullable();
            $table->text('errormessage')->nullable();
            $table->unsignedBigInteger('timecreated');
            $table->unsignedBigInteger('timecompleted')->nullable();
            $table->string('model', 50)->nullable();
            
            $table->unique(['actionname', 'actionid'], 'action');
            $table->index(['actionname', 'provider'], 'provider');
            $table->foreign('userid')->references('id')->on('users');
        });
    }
    public function down(): void { Schema::dropIfExists('ai_action_register'); }
};
