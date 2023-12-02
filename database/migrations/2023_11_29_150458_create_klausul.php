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
            $table->unsignedBigInteger('id_standar');
            $table->string('nama');
            $table->string('deskripsi');
            $table->boolean('persyaratan');
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
