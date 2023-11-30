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
        Schema::create('analisa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sub_klausul _audit');
            $table->string('deskripsi');
            $table->string('kondisi_awal');
            $table->string('dasar_evaluasi');
            $table->boolean('mematuhi_standar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisa');
    }
};
