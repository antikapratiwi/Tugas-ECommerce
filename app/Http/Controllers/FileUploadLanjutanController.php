<?php

namespace App\Http\Controllers;

use App\Models\FileUploadLanjutan;
use App\Models\ResponTemuan;
use Illuminate\Http\Request;

use App\Libraries\Helper;

class FileUploadLanjutanController extends Controller
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

        $file_upload_lanjutans = FileUploadLanjutan::latest()->get();

        return view("fileuploadlanjutan_index", [
            'main_data' => $file_upload_lanjutans
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(ResponTemuan $responTemuan)
    {
        return view('fileuploadlanjutan_create', [
            'responTemuan' => $responTemuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileUploadLanjutan = FileUploadLanjutan::create([
            // 'id' => $request,
            'id_respon_temuan' => (int)$request->id_respon_temuan,
            'file' => $request->file('file')->getClientOriginalName(),
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/submisilanjutan_index_auditee');
    }

    /**
     * Display the specified resource.
     */
    public function show(FileUploadLanjutan $fileUploadLanjutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileUploadLanjutan $fileUploadLanjutan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileUploadLanjutan $fileUploadLanjutan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileUploadLanjutan $fileUploadLanjutan)
    {
        //
    }
}
