<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = Periode::latest()->get();
        return view("periode_index", [
            'main_data' => $periodes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("periode_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // TODO: validation

        $x = Periode::create([
            // 'id' => $request,
            'nama' => $request->nama,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'no_sk' => $request->no_sk,
            'tgl_sk' => $request->tgl_sk,
            'file_sk' => $request->file('file_sk')->getClientOriginalName(),
            'nama_ketua_spi' => $request->nama_ketua_spi,
            'nip_ketua_spi' => $request->nip_ketua_spi,
        ]);

        return redirect('/periode_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        return view('/periode_detail', [
            'data' => $periode
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        return view('/periode_edit', [
            'data' => $periode
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {
        // TODO: validation
        Periode::where('id', $periode->id)->update([
            'nama' => $request->nama,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'no_sk' => $request->no_sk,
            'tgl_sk' => $request->tgl_sk,
            'file_sk' => $request->file('file_sk')->getClientOriginalName(),
            'nama_ketua_spi' => $request->nama_ketua_spi,
            'nip_ketua_spi' => $request->nip_ketua_spi,
        ]);
        
        return redirect('/periode_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
