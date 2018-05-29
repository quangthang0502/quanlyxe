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
		'licenceNumber'
	];
}
