<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\DetailSurat;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserMasukExport implements FromQuery,WithHeadings
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
        return DetailSurat::query()->join('surat_masuk', 'surat_masuk.id', '=', 'detail_surat.id_surat')
                        ->join('users', 'users.id', '=','detail_surat.id_tujuan')
                        ->select('surat_masuk.id as id', 'surat_masuk.no_surat as no_surat', 'surat_masuk.tanggal as tanggal', 'surat_masuk.asal_surat as asal_surat','users.nama_seksi as tujuan', 'surat_masuk.perihal as perihal', 'surat_masuk.file_surat as file_surat', 'surat_masuk.status as status')
                        ->where('detail_surat.id_tujuan','=',Auth::id())
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
