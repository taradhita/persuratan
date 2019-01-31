<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\User;
use Storage;
use App\Superadmin;
use App\Notifications\SuratMasukBaru;

class SuratMasukController extends Controller
{
    public function index(){
    	$suratmasuk = SuratMasuk::orderBy('id', 'desc')->get();
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
        	$filename =  "Surat-Masuk_" . rand(10,1000) . "_" . date('m-d-Y', time()) . '.' . $file->getClientOriginalExtension();
        	$suratmasuk->file_surat = $filename;
        	$file->move(public_path('images/surat_masuk'),$filename);
        }
        $suratmasuk->save();
        return redirect('/admin/surat-masuk');
        $approve = Superadmin::all();
        \Notification::send($approve, new SuratMasukBaru(SuratMasuk::latest('id')->first()));

    }

    /*public function notif(){
        return auth()->user()->unreadNotifications;
    }*/

    public function edit(SuratMasuk $surat_masuk){
        $user = User::all();
    	return view ('admin.admin-dashboard.edit-surat-masuk',compact('surat_masuk','user'));
    }

    public function update(Request $request, SuratMasuk $surat_masuk){
    	$validatedData = $request->validate([
            'no_surat' => 'required|string',
            'tanggal' => 'required',
            'tujuan' => 'required',
            'asal_surat' => 'required|string',
            'perihal' => 'string',
            'file_surat' => 'file|max:1024',
        ]);
        $surat_masuk->no_surat = $request->no_surat;
        $surat_masuk->tanggal = $request->tanggal;
        $surat_masuk->tujuan = $request->tujuan;
        $surat_masuk->asal_surat = $request->asal_surat;
        $surat_masuk->perihal = $request->perihal;
        $file = $request->file('file_surat');
        if(!empty($file)){
            $filename =  "Surat-Masuk_" . rand(10,1000) . "_" . date('m-d-Y', time()) . '.' . $file->getClientOriginalExtension();
            $oldFilename = $surat_masuk->file_surat;
            Storage::delete($oldFilename);
            $surat_masuk->file_surat = $filename;
            $file->move(public_path('images/arsip_surat'),$filename);
        }
        $surat_masuk->save();
        return redirect('/admin/surat-masuk');
    }

    public function destroy(SuratMasuk $surat_masuk){
    	$surat_masuk->delete();
    	return redirect('/admin/surat-masuk');
    }
}
