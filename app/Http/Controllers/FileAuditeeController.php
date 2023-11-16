<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileAuditeeController extends Controller
{
    public function index()
    {
        $file_auditee = FileAuditee::with('klausul')->get();

        return $file_auditee;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'url_file' => ['required'],
            'id_klausul' => ['required', 'exists:klausul, id_klausul'],
        ]);

        return FileAuditee::create($request->validated());
    }

    public function show(FileAuditee $file_auditee)
    {
        return $file_auditee;
    }

    public function update(Request $request, FileAuditee $file_auditee)
    {
        $request->validate([
            'nama' => ['required'],
            'url_file' => ['required'],
            'id_klausul' => ['required', 'exists:klausul, id_klausul'],        
        ]);

        $file_auditee->update($request->validated());

        return $file_auditee;
    }

    public function destroy(FileAuditee $file_auditee)
    {
        $file_auditee->delete();

        return response()->json();
    }
}
