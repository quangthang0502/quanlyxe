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
	        'codeDriver' => 'required|min:3',
	        'codeLocation' => 'required',
	        'firstName' => 'required|min:3',
	        'lastName' => 'required|min:3',
	        'address' => 'required|min:3',
	        'phoneNumber' => 'required|min:3',
        ];
    }

	public function messages() {
		return [
			'licenceNumber.required' => 'Thông tin biển số không được để trống',
			'model.required' => 'Thông tin Model không được để trống',
			'numberOfSeat.required' => 'Thông tin Số lượng ghế không được để trống',
			'codeDriver.required' => 'Thông tin mã tài xế không được để trống',
			'codeLocation.required' => 'Thông tin Khu vực hoạt động không được để trống',
			'firstName.required' => 'Thông tin không được để trống',
			'lastName.required' => 'Thông tin không được để trống',
			'address.required' => 'Thông tin không được để trống',
			'phoneNumber.required' => 'Thông tin không được để trống',
		];
	}
}
