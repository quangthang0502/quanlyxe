<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = [
		'id',
		'codeCustomer',
		'phoneNumber',
		'number',
		'codeLocation',
		'licenceNumber',
		'codeDriver',
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

	public function getLoTrinh(){
		return LoTrinh::where('codeCustomer', $this->codeCustomer)->first();
	}
}
