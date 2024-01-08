<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Billing;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = 2;
        $billings = Billing::where('billing.id', $id)->join('unit_audit', 'billing.id_unit_audit', '=', 'unit_audit.id')->join('standar', 'unit_audit.id_standar', '=', 'standar.id')->select('billing.*', 'standar.nama as nama_standar')->get();
        // for each billings
        foreach ($billings as $billing) {
            // get pembayaran
            $pembayaran = Pembayaran::where('id_billing', $billing->id)->get();

            $billing->pembayaran = $pembayaran;
        }

        return view('pembayaran_index', [
            'main_data' => $billings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_billing)
    {
        return view('pembayaran_create', [
            'id_billing' => $id_billing,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert
        $pembayaran = Pembayaran::create([
            'id_billing' => $request->id_billing,
            'nominal' => $request->nominal,
            'bukti_bayar' => $request->bukti_bayar,
            'keterangan' => $request->keterangan,
        ]);
        $pembayaran->save();

        // update billing
        $billing = Billing::find($request->id_billing);
        $billing->sisa_tagihan = $billing->sisa_tagihan - $request->nominal;
        $billing->status = $billing->sisa_tagihan == 0 ? 'lunas' : 'belum lunas';
        $billing->save();


        return redirect('/pembayaran_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
