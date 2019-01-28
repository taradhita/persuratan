<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\Disposisi;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class ApproveSuratController extends Controller
{
    public function index(){
        $u = Auth::user();
    	$suratmasuk = SuratMasuk::where('status','pending')->where('tujuan','=',$u->id)->orderBy('id', 'desc')->get();
    	return view('superadmin.superadmin-dashboard.superadmin-surat-masuk',compact('suratmasuk'));
    }

    public function update(SuratMasuk $surat_masuk){
    	if (Input::get('status')=='Terima'){
    		$surat_masuk->status='Diterima';
    	}
    	else if (Input::get('status')=='Tolak'){
    		$surat_masuk->status='Ditolak';
    	}
    	
    	$surat_masuk->save();
    	return redirect('/superadmin/surat-masuk');
    }

    public function suratDiterima(){
        $suratmasuk = SuratMasuk::where('status','diterima')->orderBy('id', 'desc')->get();
        return view('user-dashboard.user-surat-masuk',compact('suratmasuk'));
    }

    public function disposisiMasuk(){
        $u = Auth::user();
        $disposisi = Disposisi::where('tujuan_disposisi', '=', $u->id)->orderBy('id', 'desc')->get();
        return view('user-dashboard.disposisi-masuk',compact('disposisi'));
    }


}
