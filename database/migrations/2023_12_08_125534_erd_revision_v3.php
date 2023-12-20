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
        Schema::table('analisa_lanjutan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_analisa_cache');
            $table->foreign('id_analisa_cache')->references('id')->on('analisa');
        });

        Schema::table('sub_klausul', function (Blueprint $table) {
            $table->string('slug');
        });
        Schema::table('sub_klausul_audit', function (Blueprint $table) {
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_klausul', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('sub_klausul_audit', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('analisa_lanjutan', function (Blueprint $table) {
            $table->dropForeign(['id_analisa_cache']);
            $table->dropColumn('id_analisa_cache');
        });
    }
};
