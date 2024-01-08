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
        session()->put(['id_unit_audit' => 1]);

        $unitaudits = UnitAudit::latest()->get();
        return view('/unitaudit_index', [
            'main_data' => $unitaudits,
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

    public function select(UnitAudit $unitAudit)
    {
        $succeed = Helper::SetUnitAuditInSession($unitAudit->id);
        if($succeed)
        {
            return redirect('/unitaudit_index');
        } else {
            dd($unitAudit);
        }
    }

    public function unselect()
    {
        session()->forget('id_unit_audit');
        return redirect('/unitaudit_index');
    }
}
