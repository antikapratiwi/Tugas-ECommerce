<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileSKController extends Controller
{
    public function index()
    {
        return File_SK::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'url_file' => ['required'],
        ]);

        return File_SK::create($request->validated());
    }

    public function show(File_SK $file_sk)
    {
        return $file_sk;
    }

    public function update(Request $request, File_SK $file_sk)
    {
        $request->validate([
            'url_file' => ['required'],
        ]);

        $file_sk->update($request->validated());

        return $file_sk;
    }

    public function destroy(File_SK $file_sk)
    {
        $file_sk->delete();

        return response()->json();
    }
}
