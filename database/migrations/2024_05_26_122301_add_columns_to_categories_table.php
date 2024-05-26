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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('dimension_m')->nullable();
            $table->string('dimension_g')->nullable();
            $table->string('dimension_gg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('dimension_m');
            $table->dropColumn('dimension_g');
            $table->dropColumn('dimension_gg');
        });
    }
};
