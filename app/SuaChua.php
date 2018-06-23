<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuaChua extends Model
{
    //
	protected $fillable = [
		'id',
		'licenceNumber',
		'reason',
		'note',
		'date'
	];

	public function getTaxi(){
		return Taxi::where('licenceNumber', $this->licenceNumber)->first();
	}
}
