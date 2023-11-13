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
        Schema::create('hasil_analisis', function (Blueprint $table) {
            $table->id();
            $table->string('kondisi_awal');
            $table->string('dasar_evaluasi');
            $table->string('penyebab');
            $table->string('akibat');
            $table->string('rekomendasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_analisis');
    }
};
