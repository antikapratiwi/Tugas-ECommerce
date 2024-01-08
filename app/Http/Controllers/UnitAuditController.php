<?php

namespace App\Http\Controllers;

use App\Models\UnitAudit;
use Illuminate\Http\Request;

use App\Libraries\Helper;


class UnitAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['id_unit_audit' => 1]);
        $session_unit_audit = Helper::GetUnitAuditInSession();

        $unitaudits = UnitAudit::latest()->get();
        return view('/unitaudit_index', [
            'main_data' => $unitaudits,
            'session_unit_audit' => $session_unit_audit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitAudit $unitAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitAudit $unitAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitAudit $unitAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitAudit $unitAudit)
    {
        //
    }

    public function select()
    {

    }

    public function unselect()
    {
        
    }
}
