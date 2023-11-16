<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlausulController extends Controller
{
    public function index()
    {
        $klausul = Klausul::with('periode_audit')->get();

        return $klausul;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_klausul' => ['required'],
            'id_periode_audit' => ['required', 'exists:periode_audit, id_periode_audit'],
        ]);

        return Klausul::create($request->validated());
    }

    public function show(Klausul $klausul)
    {
        return $klausul;
    }

    public function update(Request $request, Klausul $klausul)
    {
        $request->validate([
            'nama_klausul' => ['required'],
            'id_periode_audit' => ['required', 'exists:periode_audit, id_periode_audit'],
        ]);

        $klausul->update($request->validated());

        return $klausul;
    }

    public function destroy(Klausul $klausul)
    {
        $klausul->delete();

        return response()->json();
    }
}
