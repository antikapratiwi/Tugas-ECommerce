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
        // INSTANCES
        Schema::table('user', function (Blueprint $table) {
            $table->foreign('id_unit_auditee')->references('id')->on('unit');
        });
        Schema::table('tim_auditor', function (Blueprint $table) {
            $table->foreign('id_unit_audit')->references('id')->on('unit_audit');
            $table->foreign('id_auditor')->references('id')->on('user');
        });
        Schema::table('klausul', function (Blueprint $table) {
            $table->foreign('id_standar')->references('id')->on('standar');
        });
        Schema::table('sub_klausul', function (Blueprint $table) {
            $table->foreign('id_klausul')->references('id')->on('klausul');
        });

        // MAIN
        Schema::table('unit_audit', function (Blueprint $table) {
            $table->foreign('id_periode')->references('id')->on('periode');
            $table->foreign('id_unit')->references('id')->on('unit');
            $table->foreign('id_standar')->references('id')->on('standar');
        });

        // OUTPUT & PAYMENT
        Schema::table('billing', function (Blueprint $table) {
            $table->foreign('id_unit_audit')->references('id')->on('unit_audit');
        });
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->foreign('id_billing')->references('id')->on('billing');
        });
        Schema::table('putusan_audit', function (Blueprint $table) {
            $table->foreign('id_unit_audit')->references('id')->on('unit_audit');
        });

        // AUDIT PROCESS
        Schema::table('klausul_audit', function (Blueprint $table) {
            $table->foreign('id_unit_audit')->references('id')->on('unit_audit');
        });
        Schema::table('sub_klausul_audit', function (Blueprint $table) {
            $table->foreign('id_klausul_audit')->references('id')->on('klausul_audit');
        });
        Schema::table('file_upload', function (Blueprint $table) {
            $table->foreign('id_sub_klausul_audit')->references('id')->on('sub_klausul_audit');
        });
        Schema::table('analisa', function (Blueprint $table) {
            $table->foreign('id_sub_klausul_audit')->references('id')->on('sub_klausul_audit');
        });
        Schema::table('temuan', function (Blueprint $table) {
            $table->foreign('id_analisa')->references('id')->on('analisa');
        });

        // POST-AUDIT PROCESS
        Schema::table('respon_temuan', function (Blueprint $table) {
            $table->foreign('id_temuan')->references('id')->on('temuan');
        });
        Schema::table('file_upload_lanjutan', function (Blueprint $table) {
            $table->foreign('id_respon_temuan')->references('id')->on('respon_temuan');
        });
        Schema::table('analisa_lanjutan', function (Blueprint $table) {
            $table->foreign('id_respon_temuan')->references('id')->on('respon_temuan');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // INSTANCES
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['id_unit_auditee']);
        });
        Schema::table('tim_auditor', function (Blueprint $table) {
            $table->dropForeign(['id_unit_audit', 'id_auditor']);
        });
        Schema::table('klausul', function (Blueprint $table) {
            $table->dropForeign(['id_standar']);
        });
        Schema::table('sub_klausul', function (Blueprint $table) {
            $table->dropForeign(['id_klausul']);
        });

        // MAIN
        Schema::table('unit_audit', function (Blueprint $table) {
            $table->dropForeign(['id_periode', 'id_unit', 'id_standar']);
        });

        // OUTPUT & PAYMENT
        Schema::table('billing', function (Blueprint $table) {
            $table->dropForeign(['id_unit_audit']);
        });
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign(['id_billing']);
        });
        Schema::table('putusan_audit', function (Blueprint $table) {
            $table->dropForeign(['id_unit_audit']);
        });

        // AUDIT PROCESS
        Schema::table('klausul_audit', function (Blueprint $table) {
            $table->dropForeign(['id_unit_audit']);
        });
        Schema::table('sub_klausul_audit', function (Blueprint $table) {
            $table->dropForeign(['id_klausul_audit']);
        });
        Schema::table('file_upload', function (Blueprint $table) {
            $table->dropForeign(['id_sub_klausul_audit']);
        });
        Schema::table('analisa', function (Blueprint $table) {
            $table->dropForeign(['id_sub_klausul_audit']);
        });
        Schema::table('temuan', function (Blueprint $table) {
            $table->dropForeign(['id_analisa']);
        });

        // POST-AUDIT PROCESS
        Schema::table('respon_temuan', function (Blueprint $table) {
            $table->dropForeign(['id_temuan']);
        });
        Schema::table('file_upload_lanjutan', function (Blueprint $table) {
            $table->dropForeign(['id_respon_temuan']);
        });
        Schema::table('analisa_lanjutan', function (Blueprint $table) {
            $table->dropForeign(['id_respon_temuan']);
        });
    }
};
