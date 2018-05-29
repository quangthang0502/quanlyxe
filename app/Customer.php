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
	];
}
