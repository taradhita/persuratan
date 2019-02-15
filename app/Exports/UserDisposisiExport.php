<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Auth;
use App\Disposisi;

class UserDisposisiExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($month, $year){
    	$this->month = $month;
    	$this->year = $year;
    }

    public function query()
    {
        return Disposisi::query()->join('users', 'users.id', '=','disposisi.tujuan_disposisi')
    					->select('disposisi.*', 'users.nama_seksi as tujuan_disposisi')
    					->where('disposisi.tujuan_disposisi','=',Auth::id())
    					->whereMonth('disposisi.tanggal_disposisi', '=', $this->month)
    					->whereYear('disposisi.tanggal_disposisi', '=', $this->year);
    }
}
