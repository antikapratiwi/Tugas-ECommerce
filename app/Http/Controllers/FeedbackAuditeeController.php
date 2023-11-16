<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackAuditeeController extends Controller
{
    public function index()
    {
        $feedback_auditee = FeedbackAuditee::with(['hasil_analiis', 'rencana_tindak_lanjut_auditee'])->get();

        return $feedback_auditee;
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback' => ['required'],
            'id_analisis' => ['required', 'exists:hasil_analisis, id_analisis'],
            'id_rencana' => ['required', 'exists:rencana_tindak_lanjut_auditee, id_rencana'],
        ]);

        return FeedbackAuditee::create($request->validated());
    }

    public function show(FeedbackAuditee $feedback_auditee)
    {
        return $feedback_auditee;
    }

    public function update(Request $request, FeedbackAuditee $feedback_auditee)
    {
        $request->validate([
            'feedback' => ['required'],
            'id_analisis' => ['required', 'exists:hasil_analisis, id_analisis'],
            'id_rencana' => ['required', 'exists:rencana_tindak_lanjut_auditee, id_rencana'],
        ]);

        $feedback_auditee->update($request->validated());

        return $feedback_auditee;
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return response()->json();
    }
}
