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
        Schema::create('chuyenbay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('xuatphat')->constrained('sanbay','id')->cascadeOnDelete();
            $table->foreignId('diemden')->constrained('sanbay','id')->cascadeOnDelete();
            $table->date('ngaybay');
            $table->date('ngayden');
            $table->time('giobay');
            $table->time('gioden');
            $table->integer('succhua');
            $table->unsignedInteger('tenmaybay');
            $table->decimal('giaghephothong', 10, 2); // 10 chữ số, 2 chữ số thập phân
            $table->decimal('giaghethuonggia', 10, 2); // 10 chữ số, 2 chữ số thập phân
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyenbays');
    }
};
