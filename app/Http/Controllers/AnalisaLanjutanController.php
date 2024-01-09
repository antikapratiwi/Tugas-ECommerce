<?php

namespace App\Http\Controllers;

use App\Models\AnalisaLanjutan;
use App\Models\ResponTemuan;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class AnalisaLanjutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view("analisalanjutan_index", [
            'main_data' => $klausul_audits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ResponTemuan $responTemuan)
    {
        return view('analisalanjutan_create', [
            'responTemuan' => $responTemuan
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

        $analisaLanjutan = AnalisaLanjutan::create([
            // 'id' => $request,
            'id_respon_temuan' => (int)$request->id_respon_temuan,
            'mematuhi_standar' => (int)$request->mematuhi_standar,
            'keterangan' => $request->keterangan,
            'id_analisa_cache' => 1 // UNUSED, DUMMY DATA
        ]);

        return redirect('/submisilanjutan_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnalisaLanjutan $analisaLanjutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnalisaLanjutan $analisaLanjutan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnalisaLanjutan $analisaLanjutan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnalisaLanjutan $analisaLanjutan)
    {
        //
    }
}
