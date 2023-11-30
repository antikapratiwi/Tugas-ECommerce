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
        Schema::create('sub_klausul_audit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klausul_audit');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('file_pedoman');
            $table->string('instruksi_file_upload');
            $table->string('format_file_upload'); // pdf, image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_klausul_audit');
    }
};
