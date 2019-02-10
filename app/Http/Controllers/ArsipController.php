<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function arsip(Request $request)
    {
        $seksi = '"' . $request->seksi . '"';
        $suratKeluar = DB::select("SELECT surat_keluar.id, no_surat,tanggal,tujuan,users.nama_seksi as nama, perihal, file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT status,surat_masuk.id, no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi);

        return view('admin.admin-dashboard.admin-cari-arsip', compact('seksi', 'suratKeluar','suratMasuk'));
    }

    public function searchDate(Request $request){
        $seksi = $request->seksi;
        $date  = '"' . $request->searchdate . '"';
        $suratKeluar = DB::select("SELECT surat_keluar.id, no_surat,tanggal,tujuan,users.nama_seksi as nama, perihal, file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi. " AND tanggal =" . $date);
        $suratMasuk = DB::select("SELECT status,surat_masuk.id, no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi. " AND tanggal =" . $date);

        return view('admin.admin-dashboard.admin-cari-arsip', compact('seksi', 'suratKeluar','suratMasuk'));  
    }


    public function arsipSuperAdmin(Request $request)
    {
        $seksi = '"' . $request->seksi . '"';
<<<<<<< HEAD
        $suratKeluar = DB::select("SELECT surat_keluar.id,no_surat,tanggal,tujuan,users.nama_seksi as nama,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
=======
        $suratKeluar = DB::select("SELECT status,surat_keluar.id,no_surat,tanggal,tujuan,users.nama_seksi as nama,lampiran,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
>>>>>>> 80b61a9f6664cfe2c2c3b54e2bebb3feda844b62
        $suratMasuk = DB::select("SELECT status,surat_masuk.id,no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi);

        return view('superadmin.superadmin-dashboard.superadmin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }

    public function searchDateSuperAdmin(Request $request){
        $seksi = $request->seksi;
        $date  = '"' . $request->searchdate . '"';
        $suratKeluar = DB::select("SELECT surat_keluar.id, no_surat,tanggal,tujuan,users.nama_seksi as nama, perihal, file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi. " AND tanggal =" . $date);
        $suratMasuk = DB::select("SELECT status,surat_masuk.id, no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi. " AND tanggal =" . $date);

        return view('superadmin.superadmin-dashboard.superadmin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }
}
