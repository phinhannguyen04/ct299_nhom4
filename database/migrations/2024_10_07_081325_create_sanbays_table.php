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
        Schema::create('sanbay', function (Blueprint $table) {
            $table->id();
            $table->string('ten')
                ->index()
                ->unique()
                ->collate('utf8mb4_unicode_ci');
            $table->string('thanhpho')
                ->index()
                ->collate('utf8mb4_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanbays');
    }
};
