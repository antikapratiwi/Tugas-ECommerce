<?php

namespace App\Http\Controllers;

use App\Models\PutusanAudit;
use App\Models\UnitAudit;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class PutusanAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        session()->put(['id_unit_audit' => 3]);
        // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);

        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }
        $unit_audit = $session_unit_audit->periode->nama . ' - ' . $session_unit_audit->unit->nama;
        $total_sub_klausul = $request->total_sub_klausul;
        $completed_sub_klausul = $request->completed_sub_klausul;
        $total_complied_sub_klausul = $request->total_complied_sub_klausul;
        return view('putusanaudit_create', [
            'total_sub_klausul' => $total_sub_klausul,
            'completed_sub_klausul' => $completed_sub_klausul,
            'total_complied_sub_klausul' => $total_complied_sub_klausul,
            'unit_audit' => $unit_audit,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // $request->session()->regenerate();
        // dd($request);
        // TODO: validation
        session()->put(['id_unit_audit' => 3]);
        // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);
        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $putusanAudit = PutusanAudit::create([
            'id_unit_audit' => $session_unit_audit->id,
            'mematuhi_standar' => (int)$request->mematuhi_standar,
            'tgl_rilis' => $request->tgl_rilis,
            'tgl_kadaluwarsa' => $request->tgl_kadaluwarsa,
            'keterangan' => $request->keterangan,
        ]);

        if(isset($putusanAudit)){
            UnitAudit::where('id', $session_unit_audit->id)->update([
                'status' => 'selesai'
            ]);
        }

        return redirect('/unitaudit_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PutusanAudit $putusanAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PutusanAudit $putusanAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PutusanAudit $putusanAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PutusanAudit $putusanAudit)
    {
        //
    }
}
