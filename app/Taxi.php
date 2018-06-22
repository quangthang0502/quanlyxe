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
		'frameNumber',
		'machineNumber'
	];

	public function tGetModel(){
		return $this->model;
	}

	public function setModel($model){
		$this->model = $model;
	}
}
