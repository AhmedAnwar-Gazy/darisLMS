<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('customfield_shared', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryid');
            $table->string('component', 100);
            $table->string('area', 100);
            $table->unsignedBigInteger('itemid')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->unsignedBigInteger('timecreated')->default(0);
            $table->unsignedBigInteger('timemodified')->default(0);
            
            $table->unique(['categoryid', 'component', 'area', 'itemid'], 'categoryid-component-area-itemid');
            $table->foreign('categoryid')->references('id')->on('customfield_category');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }
    public function down(): void { Schema::dropIfExists('customfield_shared'); }
};
