<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = "disposisi";

    public function user(){
    	return $this->belongsTo('App\User', 'tujuan_disposisi');
    }
}
