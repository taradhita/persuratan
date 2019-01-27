<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use DB;
use Illuminate\Support\Facades\Input;

class ApproveSuratController extends Controller
{
    public function index(){
    	$suratmasuk = SuratMasuk::where('status','pending')->orderBy('id', 'desc')->get();
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


}
