<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function arsip(Request $request)
    {
        $seksi = $request->seksi;
        $suratKeluar = DB::table('surat_keluar')
                        ->select( 'surat_keluar.id', 'no_surat','tanggal','tujuan','users.nama_seksi as nama', 'perihal', 'file_surat')
                        ->join('users','users.id', '=', 'surat_keluar.asal_surat')
                        ->where('users.nama_seksi', '=', $seksi )
                        ->get();
        $suratMasuk = DB::table('detail_surat')
                        ->join('surat_masuk', 'surat_masuk.id', '=', 'detail_surat.id_surat')
                        ->join('users', 'users.id', '=','detail_surat.id_tujuan')
                        ->select('surat_masuk.id as id', 'surat_masuk.no_surat as no_surat', 'surat_masuk.tanggal as tanggal', 'surat_masuk.asal_surat as asal_surat', 'users.nama_seksi as nama', 'surat_masuk.perihal as perihal', 'surat_masuk.file_surat as file_surat', 'surat_masuk.status as status')
                        ->where('users.nama_seksi','=',$seksi)
                        ->get();

        return view('admin.admin-dashboard.admin-cari-arsip', compact('seksi', 'suratKeluar','suratMasuk'));
    }

    public function searchDate(Request $request){
        $seksi = $request->seksi;
        $date  = $request->searchdate;
        $suratKeluar = DB::table('surat_keluar')
                        ->select( 'surat_keluar.id', 'no_surat','tanggal','tujuan','users.nama_seksi as nama', 'perihal', 'file_surat')
                        ->join('users','users.id', '=', 'surat_keluar.asal_surat')
                        ->where('users.nama_seksi', '=', $seksi )
                        ->where('tanggal','=',$date)
                        ->get();

        $suratMasuk = DB::table('detail_surat')
                        ->join('surat_masuk', 'surat_masuk.id', '=', 'detail_surat.id_surat')
                        ->join('users', 'users.id', '=','detail_surat.id_tujuan')
                        ->select('surat_masuk.id as id', 'surat_masuk.no_surat as no_surat', 'surat_masuk.tanggal as tanggal', 'surat_masuk.asal_surat as asal_surat', 'users.nama_seksi as nama', 'surat_masuk.perihal as perihal', 'surat_masuk.file_surat as file_surat', 'surat_masuk.status as status')
                        ->where('users.nama_seksi','=',$seksi)
                        ->where('tanggal','=',$date)
                        ->get();

        return view('admin.admin-dashboard.admin-cari-arsip', compact('seksi', 'suratKeluar','suratMasuk'));  
    }


    public function arsipSuperAdmin(Request $request)
    {
        $seksi = $request->seksi;
        $suratKeluar = DB::table('surat_keluar')
                        ->select( 'surat_keluar.id', 'no_surat','tanggal','tujuan','users.nama_seksi as nama', 'perihal', 'file_surat')
                        ->join('users','users.id', '=', 'surat_keluar.asal_surat')
                        ->where('users.nama_seksi', '=', $seksi )
                        ->get();
        $suratMasuk = DB::table('detail_surat')
                        ->join('surat_masuk', 'surat_masuk.id', '=', 'detail_surat.id_surat')
                        ->join('users', 'users.id', '=','detail_surat.id_tujuan')
                        ->select('surat_masuk.id as id', 'surat_masuk.no_surat as no_surat', 'surat_masuk.tanggal as tanggal', 'surat_masuk.asal_surat as asal_surat', 'users.nama_seksi as nama', 'surat_masuk.perihal as perihal', 'surat_masuk.file_surat as file_surat', 'surat_masuk.status as status')
                        ->where('users.nama_seksi','=',$seksi)
                        ->get();

        return view('superadmin.superadmin-dashboard.superadmin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }

    public function searchDateSuperAdmin(Request $request){
        $seksi = $request->seksi;
        $date  = $request->searchdate;
        $suratKeluar = DB::table('surat_keluar')
                        ->select( 'surat_keluar.id', 'no_surat','tanggal','tujuan','users.nama_seksi as nama', 'perihal', 'file_surat')
                        ->join('users','users.id', '=', 'surat_keluar.asal_surat')
                        ->where('users.nama_seksi', '=', $seksi )
                        ->where('tanggal','=',$date)
                        ->get();

        $suratMasuk = DB::table('detail_surat')
                        ->join('surat_masuk', 'surat_masuk.id', '=', 'detail_surat.id_surat')
                        ->join('users', 'users.id', '=','detail_surat.id_tujuan')
                        ->select('surat_masuk.id as id', 'surat_masuk.no_surat as no_surat', 'surat_masuk.tanggal as tanggal', 'surat_masuk.asal_surat as asal_surat', 'users.nama_seksi as nama', 'surat_masuk.perihal as perihal', 'surat_masuk.file_surat as file_surat', 'surat_masuk.status as status')
                        ->where('users.nama_seksi','=',$seksi)
                        ->where('tanggal','=',$date)
                        ->get();

        return view('superadmin.superadmin-dashboard.superadmin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }
}
