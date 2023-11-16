<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilAnalisisController extends Controller
{
    public function index()
    {
        $hasil_analisis = HasilAnalisis::with('klausul')->get();

        return $hasil_analisis;
    }

    public function store(Request $request)
    {
        $request->validate([
            'kondisi_awal' => ['required'],
            'dasar_evaluasi' => ['required'],
            'penyebab' => ['required'],
            'akibat' => ['required'],
            'rekomendasi' => ['required'],
            'id_klausul' => ['required', 'exists:klausul, id_klausul'],           
        ]);

        return Hasil_Analisis::create($request->validated());
    }

    public function show(Hasil_Analisis $hasil_analisis)
    {
        return $hasil_analisis;
    }

    public function update(Request $request, Hasil_Analisis $hasil_analisis)
    {
        $request->validate([
            'kondisi_awal' => ['required'],
            'dasar_evaluasi' => ['required'],
            'penyebab' => ['required'],
            'akibat' => ['required'],
            'rekomendasi' => ['required'],
            'id_klausul' => ['required', 'exists:klausul, id_klausul'], 
        ]);

        $hasil_analisis->update($request->validated());

        return $hasil_analisis;
    }

    public function destroy(Hasil_Analisis $hasil_analisis)
    {
        $hasil_analisis->delete();

        return response()->json();
    }
}
