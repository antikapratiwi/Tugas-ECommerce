<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class TemuanController extends Controller
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

        return view("temuan_index", [
            'main_data' => $klausul_audits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // in Analisa module
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // in Analisa module
    }

    /**
     * Display the specified resource.
     */
    public function show(Temuan $temuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temuan $temuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temuan $temuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temuan $temuan)
    {
        //
    }
}
