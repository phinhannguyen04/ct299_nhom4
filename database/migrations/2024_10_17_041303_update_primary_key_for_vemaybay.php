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
        Schema::table('vemaybay', function (Blueprint $table) {
            // cập nhật khóa chính cho ve may bay

            // xóa khóa chính hiện tại
            $table->dropPrimary(['id']);

            // viết khóa chính mới
            $table->primary(['id', 'chuyenbay_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vemaybay', function (Blueprint $table) {
            //
            $table->dropPrimary(['id', 'chuyenbay_id']);
            $table->primary(['id']);
        });
    }
};
