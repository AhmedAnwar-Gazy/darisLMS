<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reportbuilder_user_filter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reportid')->default(0);
            $table->text('filterdata');
            $table->unsignedBigInteger('usercreated')->default(0);
            $table->unsignedBigInteger('usermodified')->default(0);
            $table->unsignedBigInteger('timecreated')->default(0);
            $table->unsignedBigInteger('timemodified')->default(0);
            
            $table->unique(['reportid', 'usercreated'], 'report-user');
            $table->foreign('reportid')->references('id')->on('reportbuilder_report');
            $table->foreign('usercreated')->references('id')->on('users');
            $table->foreign('usermodified')->references('id')->on('users');
        });
    }
    public function down(): void { Schema::dropIfExists('reportbuilder_user_filter'); }
};
