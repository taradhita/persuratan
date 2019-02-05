<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\Disposisi;
use Auth;
use DB;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Notifications\ApproveSuratNotif;
use App\Notifications\TolakSuratNotif;
use App\Admin;

class ApproveSuratController extends Controller
{
    public function index(){
        $u = Auth::user();
    	$suratmasuk = SuratMasuk::where('status','pending')->where('tujuan','=',$u->id)->orderBy('id', 'desc')->paginate(15);
    	return view('superadmin.superadmin-dashboard.superadmin-surat-masuk',compact('suratmasuk'));
    }

    public function update(SuratMasuk $surat_masuk){
    	if (Input::get('status')=='Terima'){
    		$surat_masuk->status='Diterima';
            $surat_masuk->save();
            $masuk = User::where('id','=',$surat_masuk->tujuan)->get();
            \Notification::send($masuk, new ApproveSuratNotif($surat_masuk));
            return redirect('/superadmin/surat-masuk');
    	}
    	else if (Input::get('status')=='Tolak'){
    		$surat_masuk->status='Ditolak';
            $surat_masuk->save();
            $tolak = Admin::all();
            \Notification::send($tolak, new TolakSuratNotif($surat_masuk));
            return redirect('/superadmin/surat-masuk');
    	}
    	
    	//$surat_masuk->save();
    	//return redirect('/superadmin/surat-masuk');
    }

    public function notif(){
        return auth()->user()->unreadNotifications;
    }

    public function markAllAsRead(){
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function suratDiterima(){
        $u = Auth::user();
        $suratmasuk = SuratMasuk::where('status','diterima')->where('tujuan','=', $u->id)->orderBy('id', 'desc')->paginate(15);
        return view('user-dashboard.user-surat-masuk',compact('suratmasuk'));
    }

    public function disposisiMasuk(){
        $u = Auth::user();
        $disposisi = Disposisi::where('tujuan_disposisi', '=', $u->id)->orderBy('id', 'desc')->paginate(15);
        return view('user-dashboard.disposisi-masuk',compact('disposisi'));
    }


}
