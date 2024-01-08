<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandarRequest;
use App\Models\Standar;
use Illuminate\Http\Request;

class StandarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standars = Standar::orderBy('created_at', 'desc')->paginate(8)->withQueryString();
        return view('auditor.standar.index', compact('standars'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auditor.standar.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStandarRequest $request)
    {
        $standar = Standar::create($request->post());
        return redirect()->route('auditor.standar.index')->with('alert', [
            'type' => 'success',
            'message' => "Data $standar->nama created successfully!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Standar $standar)
    {
        return view('auditor.standar.show', [
            'data' => $standar
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Standar $standar)
    {
        return view('auditor.standar.edit', [
            'data' => $standar
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStandarRequest $request, Standar $standar)
    {
        $data = $request->post();
        $data['tgl_rilis'] = \Carbon\Carbon::parse(strtotime($data['tgl_rilis']))->toDate()->format('d - F - o');
        $standar->update($data);
        return redirect()->route('auditor.standar.index')->with('alert', [
            'type' => 'success',
            'message' => "Data $standar->nama updated successfully!"
        ]);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standar $standar)
    {
        $standar->delete();
        return redirect()->route('auditor.standar.index')->with('alert', [
            'type' => 'success',
            'message' => "Data $standar->nama deleted successfully!"
        ]);
    }
}
