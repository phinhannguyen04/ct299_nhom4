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
            //
            $table->string('mavemaybay')->after('id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vemaybay', function (Blueprint $table) {
            //
            $table->dropColumn('mavemaybay');
        });
    }
};
