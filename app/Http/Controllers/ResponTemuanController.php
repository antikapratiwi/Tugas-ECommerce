<?php

namespace App\Http\Controllers;

use App\Models\ResponTemuan;
use App\Models\Temuan;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class ResponTemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // session()->put(['id_unit_audit' => 3]);
        // // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);

        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $klausul_audits = $session_unit_audit->klausul_audits;

        return view("respontemuan_index", [
            'main_data' => $klausul_audits
        ]);
    }

    public function index_auditee()
    {
        session()->put(['id_unit_audit' => 3]);
        // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);

        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $klausul_audits = $session_unit_audit->klausul_audits;

        return view("respontemuan_index_auditee", [
            'main_data' => $klausul_audits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Temuan $temuan)
    {
        return view('respontemuan_create', [
            'temuan' => $temuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $responTemuan = ResponTemuan::create([
            // 'id' => $request,
            'id_temuan' => (int)$request->id_temuan,
            'feedback' => $request->feedback,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
            'tgl_kesanggupan' => $request->tgl_kesanggupan,
        ]);

        return redirect('/submisilanjutan_index_auditee');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResponTemuan $responTemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResponTemuan $responTemuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResponTemuan $responTemuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResponTemuan $responTemuan)
    {
        //
    }
}
