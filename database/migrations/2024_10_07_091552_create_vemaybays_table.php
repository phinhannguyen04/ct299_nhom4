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
        Schema::create('vemaybay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chuyenbay_id')->constrained('chuyenbay', 'id')->cascadeOnDelete();
            $table->foreignId('chongoi_id')->constrained('chongoi', 'id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->date('ngaymua');
            $table->string('loaive');
            $table->double('khoiluong')->default(7);
            $table->decimal('gia', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vemaybays');
    }
};
