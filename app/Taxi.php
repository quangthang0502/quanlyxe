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
	];

	public function tGetModel(){
		return $this->model;
	}
}
