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
        Schema::create('chitietthanhtien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khoiluonghanhly_id')->constrained('khoiluonghanhly', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('vemaybay_id')->constrained('vemaybay', 'id')->cascadeOnDelete();
            $table->decimal('thanhtien', 10, 2);
            $table->string('mota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietthanhtien');
    }
};
