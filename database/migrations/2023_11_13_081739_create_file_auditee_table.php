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
        Schema::create('file_auditee', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('url_file');
            $table->integer('id_analisis')->references('id_analisis')->on('hasil_analisis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_auditee');
    }
};
