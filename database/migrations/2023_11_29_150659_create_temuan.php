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
        Schema::create('temuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_analisa');
            $table->string('jenis'); // major, minor
            $table->text('penyebab');
            $table->text('akibat');
            $table->text('rekomendasi_tindak_lanjut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temuan');
    }
};
