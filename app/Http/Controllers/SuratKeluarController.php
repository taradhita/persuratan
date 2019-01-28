<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use Auth;

class SuratKeluarController extends Controller
{
    public function index(){
		$suratkeluar = SuratKeluar::orderBy('id', 'desc')->get();
    	return view('user-dashboard.user-surat-keluar',compact('suratkeluar'));
    }

    public function create(){
    	$suratkeluar = SuratKeluar::all();
    	return view('user-dashboard.upload-surat-keluar',compact('suratmasuk'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
            'no_surat' => 'required|string',
            'tanggal' => 'required',
            'tujuan' => 'required',
            'perihal' => 'string',
            'file_surat' => 'file|max:1024',
        ]);
        $suratkeluar = new SuratKeluar();
        $suratkeluar->no_surat = $request->no_surat;
        $suratkeluar->tanggal = $request->tanggal;
        $suratkeluar->tujuan = $request->tujuan;
        $suratkeluar->asal_surat = $request->asal_surat;
        $suratkeluar->perihal = $request->perihal;
        $file = $request->file('file_surat');
        if(!empty($file)){
        	$filename =  "Surat-Keluar_" . rand(10,1000) . "_" . date('m-d-Y', time()) . '.' . $file->getClientOriginalExtension();
        	$suratkeluar->file_surat = $filename;
        	$file->move(public_path('images/surat_keluar'),$filename);
        }
        $suratkeluar->save();
        return redirect('/user/surat-keluar');
    }

}
