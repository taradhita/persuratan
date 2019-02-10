<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SuratMasuk;
use App\DetailSurat;

class TambahTujuanController extends Controller
{
    public function create(Request $request){
    	$id = $request->id;
    	$user = User::all();
    	return view('superadmin.superadmin-dashboard.tambah-tujuan',compact('id','user'));
    }

    public function store(Request $request){
    	$detail = new DetailSurat();
    	$detail->id_surat = $request->id_surat;
    	$detail->id_tujuan = $request->id_tujuan;
    	$detail->save();
    	return redirect('/superadmin/surat-masuk');
    }
}
