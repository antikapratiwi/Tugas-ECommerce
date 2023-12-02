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
        Schema::create('putusan_audit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unit_audit');
            $table->boolean('mematuhi_standar');
            $table->date('tgl_rilis');
            $table->date('tgl_kadaluwarsa');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('putusan_audit');
    }
};
