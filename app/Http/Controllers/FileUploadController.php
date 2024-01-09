<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Models\SubKlausulAudit;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->put(['id_unit_audit' => 3]);
        // dd("hello");

        $session_unit_audit = Helper::GetUnitAuditInSession(true);

        if($session_unit_audit === null)
        {
            return redirect('/unitaudit_index');
        }

        $file_uploads = FileUpload::latest()->get();

        return view("fileupload_index", [
            'main_data' => $file_uploads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SubKlausulAudit $subKlausulAudit)
    {
        return view('fileupload_create', [
            'subKlausulAudit' => $subKlausulAudit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileUpload = FileUpload::create([
            // 'id' => $request,
            'id_sub_klausul_audit' => (int)$request->id_sub_klausul_audit,
            'file' => $request->file('file')->getClientOriginalName(),
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/submisi_index_auditee');
    }

    /**
     * Display the specified resource.
     */
    public function show(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileUpload $fileUpload)
    {
        //
    }
}
