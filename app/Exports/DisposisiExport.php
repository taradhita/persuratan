<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Disposisi;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DisposisiExport implements FromQuery,WithHeadings
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
    					//->where('disposisi.tujuan_disposisi','=',Auth::id())
    					->whereMonth('disposisi.tanggal_disposisi', '=', $this->month)
    					->whereYear('disposisi.tanggal_disposisi', '=', $this->year);
    }

    public function headings(): array
    {
        return [
            '#',
            'No Disposisi',
            'Tanggal Disposisi',
            'Tujuan Disposisi',
            'File Surat',
            'Note',
            'Created At',
            'Updated At'
        ];
    }
}
