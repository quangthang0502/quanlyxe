<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model {
	//
	protected $fillable = [
		'id',
		'licenceNumber',
		'model',
		'numberOfSeat',
		'status',
		'codeDriver',
		'codeLocation'
	];

	public function tGetModel(){
		return $this->model;
	}

	public function getDriver(){
		return TaiXe::where('codeDriver',$this->codeDriver)->first();
	}

	public function getLocation(){
		return KhuVuc::where('codeLocation', $this->codeLocation)->first();
	}
}
