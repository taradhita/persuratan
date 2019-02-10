<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    public $table = "surat_masuk";

    protected $fillable = [
    	'no_surat','tanggal', 'asal_surat','perihal','file_surat','status'
    ];

    public function user(){
    	return $this->belongsTo('App\User', 'tujuan');
    }
}
