<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use DB;

class ApproveSuratController extends Controller
{
    public function index(){
    	$suratmasuk = SuratMasuk::where('status','pending')->orderBy('id', 'desc')->get();
    	return view('superadmin.superadmin-dashboard.superadmin-surat-masuk',compact('suratmasuk'));
    }

    public function edit(){
    	
    }
}
