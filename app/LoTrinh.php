<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoTrinh extends Model
{
	protected $fillable = [
		'id',
		'origin',
		'destination',
		'time',
		'numberOfKm',
		'mediumTime',
		'level',
		'fee',
		'codeCustomer'
	];
}
