<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxiFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'licenceNumber' => 'required|min:3',
	        'model' => 'required',
	        'numberOfSeat' => 'required',
	        'frameNumber' => 'required',
	        'machineNumber' => 'required',
        ];
    }

	public function messages() {
		return [
			'licenceNumber.required' => 'Thông tin biển số không được để trống',
			'model.required' => 'Thông tin Model không được để trống',
			'numberOfSeat.required' => 'Thông tin Số lượng ghế không được để trống',
			'frameNumber.required' => 'Thông tin không được để trống',
			'machineNumber.required' => 'Thông tin không được để trống',
		];
	}
}
