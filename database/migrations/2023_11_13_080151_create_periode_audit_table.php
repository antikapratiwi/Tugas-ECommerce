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
        Schema::create('periode_audit', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal_audit');
            $table->string('no_sk_tugas_audit');
            $table->timestamp('tanggal_sk')->nullable();
            $table->integer('id_file_sk')->references('id_file_sk')->on('file_sk');
            $table->integer('id_ketua_spi')->references('id_anggota')->on('anggota');
            $table->integer('id_billing')->references('id_billing')->on('billing');
            $table->integer('id_unit')->references('id_unit')->on('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_audit');
    }
};
