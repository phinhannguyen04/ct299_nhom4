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
            // drop khóa ngoại
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // thêm khóa ngoại và cập nhật nullable()
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users', 'id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vemaybay', function (Blueprint $table) {
            // gỡ khóa ngoại & xóa bỏ cột user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // tạo khóa ngoại và gắn vào cột id của bảng user
            $table->foreignId('user_id')->constrained('users', 'id');

        });
    }
};
