<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiXe extends Model
{
	protected $fillable = [
		'id',
		'codeDriver',
		'firstName',
		'lastName',
		'address',
		'phoneNumber',
	];
}
