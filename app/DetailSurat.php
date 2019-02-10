<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSurat extends Model
{
    public $table = "detail_surat";

    protected $fillable = [
    	'id_surat','id_tujuan'
    ];

    
}
