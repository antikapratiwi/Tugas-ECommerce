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
        Schema::create('respon_temuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_temuan');
            $table->text('feedback');
            $table->text('rencana_tindak_lanjut');
            $table->date('tgl_kesanggupan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respon_temuan');
    }
};
