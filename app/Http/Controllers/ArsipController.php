<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function arsip(Request $request)
    {
        $seksi = '"' . $request->seksi . '"';
        $suratKeluar = DB::select("SELECT no_surat,tanggal,tujuan,users.nama_seksi as nama,lampiran,status,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.seksi =" . $seksi);

        return view('admin.admin-dashboard.admin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }

    public function arsipSuperAdmin(Request $request)
    {
        $seksi = '"' . $request->seksi . '"';
        $suratKeluar = DB::select("SELECT no_surat,tanggal,tujuan,users.nama_seksi as nama,lampiran,status,file_surat FROM surat_keluar INNER JOIN users ON users.id = surat_keluar.asal_surat WHERE users.seksi =" . $seksi);
        $suratMasuk = DB::select("SELECT no_surat,tanggal,tujuan,users.nama_seksi as nama,perihal,status,file_surat FROM surat_masuk INNER JOIN users ON users.id = surat_masuk.tujuan WHERE users.seksi =" . $seksi);

        return view('superadmin.superadmin-dashboard.superadmin-cari-arsip', compact('seksi', 'suratKeluar', 'suratMasuk'));
    }
}
