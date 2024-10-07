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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('cccd')->default('')->change();
            $table->string('passport')->default('')->change();
            $table->string('diachi')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('cccd')->default(null)->change();
            $table->string('partport')->default(null)->change();
            $table->string('diachi')->default(null)->change();
        });
    }
};
