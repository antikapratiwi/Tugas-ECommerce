<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with(['role', 'unit'])->get();

        return $anggota;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => ['required'],
            'nama' => ['required'],
            'id_role' => ['required', 'exists:role, id_role'],
            'id_unit' => ['required', 'exists:unit, id_unit'],
        ]);

        return Anggota::create($request->validated());
    }

    public function show(Anggota $anggota)
    {
        return $anggota;
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nip' => ['required'],
            'nama' => ['required'],
            'id_role' => ['required', 'exists:role, id_role'],
            'id_unit' => ['required', 'exists:unit, id_unit'],
        ]);

        $anggota->update($request->validated());

        return $anggota;
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return response()->json();
    }
}
