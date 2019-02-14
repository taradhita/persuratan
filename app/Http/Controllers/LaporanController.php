<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SuratMasuk;
use App\SuratKeluar;
use App\Disposisi;

class LaporanController extends Controller
{

    public function LaporanMasuk(Request $request){
    	$selectyear = SuratMasuk::groupBy('yr')->selectRaw('YEAR(tanggal) as yr')->get();
    	$month = $request->month;
    	$year = $request->year;
    	$suratMasuk = DB::table('detail_surat')
    					->join('surat_masuk', 'surat_masuk.id', '=', 'detail_surat.id_surat')
    					->join('users', 'users.id', '=','detail_surat.id_tujuan')
    					->select('surat_masuk.id as id', 'surat_masuk.no_surat as no_surat', 'surat_masuk.tanggal as tanggal', 'surat_masuk.asal_surat as asal_surat', 'users.nama_seksi as tujuan', 'surat_masuk.perihal as perihal', 'surat_masuk.file_surat as file_surat', 'surat_masuk.status as status')
    					->whereMonth('surat_masuk.tanggal', '=', $month)
    					->whereYear('surat_masuk.tanggal', '=', $year)
    					->get();
        return view ('admin.admin-dashboard.laporan-masuk', compact('suratMasuk', 'selectyear'));
    }

    public function LaporanKeluar(Request $request){
    	$selectyear = SuratKeluar::groupBy('yr')->selectRaw('YEAR(tanggal) as yr')->get();
    	$month = $request->month;
    	$year = $request->year;
    	$suratKeluar = SuratKeluar::join('users', 'users.id', '=','surat_keluar.asal_surat')
    					->select('surat_keluar.*', 'users.nama_seksi as asal_surat')
    					->whereMonth('surat_keluar.tanggal', '=', $month)
    					->whereYear('surat_keluar.tanggal', '=', $year)
    					->get();
    	return view ('admin.admin-dashboard.laporan-keluar', compact('suratKeluar', 'selectyear'));
    }

    public function LaporanDisposisi(Request $request){
    	$selectyear = Disposisi::groupBy('yr')->selectRaw('YEAR(tanggal_disposisi) as yr')->get();
    	$month = $request->month;
    	$year = $request->year;
    	$disposisi = Disposisi::join('users', 'users.id', '=','disposisi.tujuan_disposisi')
    					->select('disposisi.*', 'users.nama_seksi as tujuan_disposisi')
    					->whereMonth('disposisi.tanggal_disposisi', '=', $month)
    					->whereYear('disposisi.tanggal_disposisi', '=', $year)
    					->get();
    	return view ('admin.admin-dashboard.laporan-disposisi', compact('disposisi', 'selectyear'));
    }

}
