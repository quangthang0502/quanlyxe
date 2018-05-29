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
}
