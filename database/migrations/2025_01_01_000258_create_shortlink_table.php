<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('shortlink', function (Blueprint $table) {
            $table->id();
            $table->string('shortcode', 12);
            $table->unsignedBigInteger('userid');
            $table->string('component', 100);
            $table->string('linktype', 100);
            $table->string('identifier', 1333);
            
            $table->unique(['userid', 'shortcode'], 'shortcode_userid');
            $table->index('shortcode');
            $table->foreign('userid')->references('id')->on('users');
        });
    }
    public function down(): void { Schema::dropIfExists('shortlink'); }
};
