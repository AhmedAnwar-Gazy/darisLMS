<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stored_progress', function (Blueprint $table) {
            $table->id();
            $table->string('idnumber', 255);
            $table->unsignedBigInteger('timestart')->nullable();
            $table->unsignedBigInteger('lastupdate')->nullable();
            $table->decimal('percentcompleted', 5, 2)->default(0)->nullable();
            $table->string('message', 255)->nullable();
            $table->unsignedTinyInteger('haserrored')->default(0);
            
            $table->index('idnumber', 'uid_index');
        });
    }
    public function down(): void { Schema::dropIfExists('stored_progress'); }
};
