<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemLoTrinh extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'codeCustomer'  => 'required',
			'phoneNumber'   => 'required',
			'number'        => 'required',
			'codeDriver'    => 'required',
			'origin'        => 'required',
			'destination'   => 'required',
			'time'          => 'required',
			'numberOfKm'    => 'required',
			'fee'           => 'required',
		];
	}
}
