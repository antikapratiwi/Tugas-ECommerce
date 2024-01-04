<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::latest()->get();
        return view("unit_index", [
            'main_data' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("unit_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // TODO: validation

        $x = Unit::create([
            // 'id' => $request,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nip_pimpinan' => $request->nip_pimpinan
        ]);

        return redirect('/unit_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        // TODO: validation

        $unit->delete();
        return redirect('/unit_index');
    }
}
