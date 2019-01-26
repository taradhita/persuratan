<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\User;

class SuratMasukController extends Controller
{
    public function index(){
    	$suratmasuk = SuratMasuk::all();
    	return view('admin.admin-dashboard.admin-surat-masuk',compact('suratmasuk'));
    }

    public function create(){
    	$suratmasuk = SuratMasuk::all();
    	$user = User::all();
    	return view('admin.admin-dashboard.upload-surat-masuk',compact('suratmasuk','user'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
            'no_surat' => 'required|string',
            'tanggal' => 'required',
            'tujuan' => 'required',
            'asal_surat' => 'required|string',
            'perihal' => 'string',
            'file_surat' => 'file|max:1024',
            //'status' => 'required'
        ]);
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_surat = $request->no_surat;
        $suratmasuk->tanggal = $request->tanggal;
        $suratmasuk->tujuan = $request->tujuan;
        $suratmasuk->asal_surat = $request->asal_surat;
        $suratmasuk->perihal = $request->perihal;
        $file = $request->file('file_surat');
        if(!empty($file)){
        	$filename = $suratmasuk->no_surat . "_" . date('m-d-Y', time()) . '.' . $file->getClientOriginalExtension();
        	$suratmasuk->file_surat = $request->file_surat;
        	$file->move(public_path('images/surat_masuk'),$filename);
        }
        $suratmasuk->save();
        return redirect('/admin/surat-masuk');

    }

    public function edit(Request $request){
    	//
    }

    public function update(){
    	//
    }

    public function destroy(SuratMasuk $suratmasuk){
    	$suratmasuk->delete();
    	return redirect('/admin/surat-masuk');
    }
}
