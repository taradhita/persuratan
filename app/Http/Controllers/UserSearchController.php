<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\SuratMasuk;
use App\Disposisi;
use App\SuratKeluar;

class UserSearchController extends Controller
{
    public function searchSuratMasuk(Request $request){
    	$u = Auth::user();
    	$search = $request->get('searchdate');
        $suratmasuk = SuratMasuk::where('status','diterima')->where('tujuan','=', $u->id)->where('tanggal','like','%'.$search.'%')->paginate(15);
        return view('user-dashboard.user-surat-masuk',compact('suratmasuk'));
    }

    public function searchDisposisi(Request $request){
    	$u = Auth::user();
    	$search = $request->get('searchdate');
        $disposisi = Disposisi::where('tujuan_disposisi','=', $u->id)->where('tanggal_disposisi','like','%'.$search.'%')->paginate(15);
        return view('user-dashboard.disposisi-masuk',compact('disposisi'));
    }

    public function searchSuratKeluar(Request $request){
        $u = Auth::user();
        $search = $request->get('searchdate');
        $suratkeluar = SuratKeluar::where('asal_surat','=', $u->id)->where('tanggal','like','%'.$search.'%')->paginate(15);
        return view('user-dashboard.user-surat-keluar',compact('suratkeluar'));
    }

}
