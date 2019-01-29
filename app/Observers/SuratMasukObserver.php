<?php

namespace App\Observers;

use App\Notifications\SuratMasukBaru;
use App\SuratMasuk;
use App\Superadmin;

/**
 * 
 */
class SuratMasukObserver 
{
	
	function created(SuratMasuk $smasuk)
	{
		$sender = $smasuk->asal_surat;
		$sadmin = Superadmin::all();
		foreach ($sadmin as $s) {
			$s->notify(new SuratMasukBaru($smasuk, $sender));
		}
	}
}