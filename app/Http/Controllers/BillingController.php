<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        return Billing::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_billing' => ['required'],
            'bukti_bayar' => ['required'],
        ]);

        return Billing::create($request->validated());
    }

    public function show(Billing $billing)
    {
        return $billing;
    }

    public function update(Request $request, Billing $billing)
    {
        $request->validate([
            'no_billing' => ['required'],
            'bukti_bayar' => ['required'],
        ]);

        $billing->update($request->validated());

        return $billing;
    }

    public function destroy(Billing $billing)
    {
        $billing->delete();

        return response()->json();
    }
}
