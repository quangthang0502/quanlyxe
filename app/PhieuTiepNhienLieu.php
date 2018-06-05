<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuTiepNhienLieu extends Model
{
	protected $fillable = [
		'id',
		'time',
		'numberGasoline',
		'numberOil',
		'licenceNumber',
		'codeDriver',
		'codeLocation'
	];

	public function getDriver(){
		return TaiXe::where('codeDriver',$this->codeDriver)->first();
	}

	public function getLocation(){
		return KhuVuc::where('codeLocation', $this->codeLocation)->first();
	}
}
