<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\SuratKeluar;
use Auth;

class UserKeluarExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    	public function __construct($month, $year)
    	{
        	$this->month = $month;
        	$this->year = $year;
    	}

    	public function query()
    	{
    		return SuratKeluar::query()->join('users', 'users.id', '=','surat_keluar.asal_surat')
    					->select('surat_keluar.*', 'users.nama_seksi as asal_surat')
    					->where('surat_keluar.asal_surat','=',Auth::id())
    					->whereMonth('surat_keluar.tanggal', '=', $this->month)
    					->whereYear('surat_keluar.tanggal', '=', $this->year);
    	}

}
