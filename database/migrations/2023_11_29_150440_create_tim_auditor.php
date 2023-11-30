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
        Schema::create('tim_auditor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unit_audit')->nullable();
            $table->unsignedBigInteger('id_auditor')->nullable();
            $table->string('jabatan'); // ketua, anggota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_auditor');
    }
};
