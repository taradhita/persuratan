<?php

namespace App\Http\Controllers;

use App\Disposisi;
use App\Http\Requests\DisposisiRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DisposisiController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('superadmin.superadmin-dashboard.upload-disposisi', compact('users'));
    }

    public function create()
    {

    }

    public function store(DisposisiRequest $request)
    {

        if ($request->hasFile('file_disposisi')) {
            $file = $request->file('file_disposisi');

            $filename = 'Disposisi_' . Str::random(40) . '.' . $file->extension();

            $file->storeAs('public/disposisi/', $filename);
        }

        $disposisi = new Disposisi();

        $disposisi->no_disposisi = $request['no_disposisi'];
        $disposisi->tanggal_disposisi = $request['tanggal_disposisi'];
        $disposisi->tujuan_disposisi = $request['tujuan_disposisi'];
        $disposisi->file_disposisi = $filename;
        $disposisi->note = $request['note'];

        $disposisi->save();

        return redirect()->back();
    }

    public function getFile($id)
    {
        $file = Disposisi::findOrFail($id);

        $filePath = 'public/disposisi/' . $file->file_disposisi;

        $pdfContent = Storage::get($filePath);

        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
