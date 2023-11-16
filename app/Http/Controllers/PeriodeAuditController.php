<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodeAuditController extends Controller
{
    public function index()
    {
        $periode_audit = PeriodeAudit::with(['file_sk', 'anggota', 'billing', 'unit'])->get();

        return $periode_audit;
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_audit' => ['required'],
            'no_sk_tugas_audit' => ['required'],
            'tanggal_sk' => ['required'],
            'id_file_sk' => ['required', 'exists:file_sk, id_file_sk'],
            'id_ketua_spi' => ['required', 'exists:anggota, id_ketua_spi'],
            'id_billing' => ['required', 'exists:billing, id_billing'],
            'id_unit' => ['required', 'exists:unit, id_unit'],
        ]);

        return PeriodeAudit::create($request->validated());
    }

    public function show(PeriodeAudit $periode_audit)
    {
        return $periode_audit;
    }

    public function update(Request $request, PeriodeAudit $periode_audit)
    {
        $request->validate([
            'tanggal_audit' => ['required'],
            'no_sk_tugas_audit' => ['required'],
            'tanggal_sk' => ['required'],
            'id_file_sk' => ['required', 'exists:file_sk, id_file_sk'],
            'id_ketua_spi' => ['required', 'exists:anggota, id_ketua_spi'],
            'id_billing' => ['required', 'exists:billing, id_billing'],
            'id_unit' => ['required', 'exists:unit, id_unit'],
        ]);

        $periode_audit->update($request->validated());

        return $periode_audit;
    }

    public function destroy(PeriodeAudit $periode_audit)
    {
        $periode_audit->delete();

        return response()->json();
    }
}
