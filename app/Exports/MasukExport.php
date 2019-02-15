<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\SuratMasuk;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasukExport implements FromQuery, WithHeadings
{
    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return SuratMasuk::query()
                        ->select('*')
                        //->where('detail_surat.id_tujuan','=',Auth::id())
                        ->whereMonth('surat_masuk.tanggal', '=', $this->month)
                        ->whereYear('surat_masuk.tanggal', '=', $this->year);
                        //->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'No Surat',
            'Tanggal Masuk',
            'Asal Surat',
            'Perihal',
            'File Surat',
            'Status',
            'Created At',
            'Updated At'
        ];
    }
}
