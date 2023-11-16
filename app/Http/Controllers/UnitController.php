<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return Unit::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);

        return Unit::create($request->validated());
    }

    public function show(Unit $unit)
    {
        return $unit;
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'nama_unit' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],        
        ]);

        $unit->update($request->validated());

        return $unit;
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json();
    }
}
