<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
    //
	protected $fillable = [
		'codeLocation',
		'nameLocation',
		'addressParkTaxi',
		'addressInputGasoline'
	];
}
