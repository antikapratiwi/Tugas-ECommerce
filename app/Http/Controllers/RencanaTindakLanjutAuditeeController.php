<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RencanaTindakLanjutAuditeeController extends Controller
{
    public function index()
    {
        return Rencana_Tindak_Lanjut_Auditee::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => ['required'],
        ]);

        return Rencana_Tindak_Lanjut_Auditee::create($request->validated());
    }

    public function show(Rencana_Tindak_Lanjut_Auditee $rencana_tindak_lanjut_auditee)
    {
        return $rencana_tindak_lanjut_auditee;
    }

    public function update(Request $request, Rencana_Tindak_Lanjut_Auditee $rencana_tindak_lanjut_auditee)
    {
        $request->validate([
            'tanggal' => ['required'],
        ]);

        $rencana_tindak_lanjut_auditee->update($request->validated());

        return $rencana_tindak_lanjut_auditee;
    }

    public function destroy(Rencana_Tindak_Lanjut_Auditee $rencana_tindak_lanjut_auditee)
    {
        $rencana_tindak_lanjut_auditee->delete();

        return response()->json();
    }
}
