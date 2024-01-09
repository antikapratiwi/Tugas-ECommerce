<?php

namespace App\Http\Controllers;

use App\Models\Analisa;
use App\Models\Temuan;
use App\Models\SubKlausulAudit;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class AnalisaController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    public function index()
    {
        session()->put(['id_unit_audit' => 3]);
        // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);

        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $klausul_audits = $session_unit_audit->klausul_audits;

        return view("analisa_index", [
            'main_data' => $klausul_audits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SubKlausulAudit $subKlausulAudit)
    {
        return view('analisa_create', [
            'subKlausulAudit' => $subKlausulAudit
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

        $analisa = Analisa::create([
            // 'id' => $request,
            'id_sub_klausul_audit' => (int)$request->id_sub_klausul_audit,
            'deskripsi' => $request->deskripsi,
            'kondisi_awal' => $request->kondisi_awal,
            'dasar_evaluasi' => $request->dasar_evaluasi,
            'mematuhi_standar' => (int)$request->mematuhi_standar
        ]);

        if($request->mematuhi_standar == false)
        {
            $temuan = Temuan::create([
                // 'id' => $request,
                'id_analisa' => $analisa->id,
                'jenis' => $request->jenis,
                'penyebab' => $request->penyebab,
                'akibat' => $request->akibat,
                'rekomendasi_tindak_lanjut' => (int)$request->rekomendasi_tindak_lanjut
            ]);
        }

        return redirect('/submisi_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Analisa $analisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analisa $analisa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Analisa $analisa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Analisa $analisa)
    {
        //
    }




    public function index_auditee()
    {
        // session()->put(['id_unit_audit' => 3]);
        // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);

        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $klausul_audits = $session_unit_audit->klausul_audits;

        return view("analisa_index_auditee", [
            'main_data' => $klausul_audits
        ]);
    }
}
