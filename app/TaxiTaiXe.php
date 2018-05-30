<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiTaiXe extends Model
{
	protected $fillable = [
		'id',
		'codeDriver',
		'licenceNumber',
		'codeLocation',
		'shift'
	];
}
