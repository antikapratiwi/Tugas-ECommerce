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
            $table->integer("id_periode_audit")->references('id_periode_audit')->on('periode_audit');
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
