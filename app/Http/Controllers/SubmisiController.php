<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Helper;

class SubmisiController extends Controller
{
    public function index_audit()
    {
        session()->put(['id_unit_audit' => 3]);

        $session_unit_audit = Helper::GetUnitAuditInSession(true);
        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $klausul_audits = $session_unit_audit->klausul_audits;

        return view("submisi_index_auditor", [
            'main_data' => $klausul_audits
        ]);
    }

    public function index_postaudit()
    {
        session()->put(['id_unit_audit' => 3]);

        $session_unit_audit = Helper::GetUnitAuditInSession(true);
        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $klausul_audits = $session_unit_audit->klausul_audits;

        return view("submisilanjutan_index_auditor", [
            'main_data' => $klausul_audits
        ]);
    }
}
