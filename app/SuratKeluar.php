<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    public $table = "surat_keluar";

    protected $fillable = [
    	'no_surat','tanggal','tujuan', 'asal_surat','perihal','file_surat'
    ];
   public function user(){
    	return $this->belongsTo('App\User', 'asal_surat', 'id');
    }
}
