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
        Schema::create('klausul', function (Blueprint $table) {
            $table->id();
            $table->string("nama_klausul");
            $table->integer("id_unit")->references('id_unit')->on('unit');
            $table->integer("id_analisis")->references('id_analisis')->on('hasil_analisis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klausul');
    }
};
