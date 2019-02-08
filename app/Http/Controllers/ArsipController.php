<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function arsip(Request $request)
    {
        $seksi = '"' . $request->seksi . '"';
<<<<<<< HEAD
        $suratKeluar = DB::select("SELECT status,no_surat,tanggal,tujuan,users.nama_seksi as nama,lampiran,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT status,no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi);
=======
        $suratKeluar = DB::select("SELECT surat_keluar.id, no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT surat_masuk.id, no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi);
>>>>>>> ba1a664767f27bd77a5c8199cadd94c2049996d3

        return view('admin.admin-dashboard.admin-cari-arsip', compact('seksi', 'suratKeluar','suratMasuk'));
    }



    public function arsipSuperAdmin(Request $request)
    {
        $seksi = '"' . $request->seksi . '"';
<<<<<<< HEAD
        $suratKeluar = DB::select("SELECT no_surat,tanggal,tujuan,users.nama_seksi as nama,lampiran,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi);
=======
        $suratKeluar = DB::select("SELECT surat_keluar.id,no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.nama_seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT surat_masuk.id,no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.nama_seksi =" . $seksi);
>>>>>>> ba1a664767f27bd77a5c8199cadd94c2049996d3

        return view('superadmin.superadmin-dashboard.superadmin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }
}
