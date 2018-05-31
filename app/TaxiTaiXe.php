<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiTaiXe extends Model
{
	protected $fillable = [
		'id',
		'codeDriver',
		'licenceNumber',
		'codeLocation',
		'shift'
	];

	public function getDriver(){
		return TaiXe::where('codeDriver',$this->codeDriver)->first();
	}

	public function getLocation(){
		return KhuVuc::where('codeLocation', $this->codeLocation)->first();
	}

	public function getTaxi(){
		return Taxi::where('licenceNumber', $this->licenceNumber)->first();
	}
}
