<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chuyenbay', function (Blueprint $table) {
            // đổi kiểu dữ liệu cho cột tenmaybay
            $table->string('tenmaybay')->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chuyenbay', function (Blueprint $table) {
            // chuyển về unsignInterger ban đầu
            $table->unsignedInteger('tenmaybay')->change();
        });
    }
};
