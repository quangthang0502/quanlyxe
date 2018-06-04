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
		'fee',
		'codeCustomer'
	];

	function getCustomer(){
		return Customer::where('codeCustomer', $this->codeCustomer)->first();
	}
}
