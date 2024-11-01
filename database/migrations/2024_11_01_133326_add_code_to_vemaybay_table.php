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
            // Thêm cột guest_code
            $table->string('guest_code')->nullable(); // Đặt nullable nếu cần thiết
            // Định nghĩa khóa ngoại cho guest_code
            $table->foreign('guest_code')
                ->references('code')->on('passengers') // Đảm bảo cột 'code' tồn tại trong passengers
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vemaybay', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['guest_code']);
            // Xóa cột guest_code
            $table->dropColumn('guest_code');
        });
    }
};
