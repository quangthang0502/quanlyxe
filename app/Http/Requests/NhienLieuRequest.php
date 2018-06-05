<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhienLieuRequest extends FormRequest
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
	        'time' => 'required',
	        'numberGasoline' => 'required',
	        'numberOil' => 'required',
	        'codeDriver' => 'required',
	        'codeLocation' => 'required',
        ];
    }

    public function messages() {
	    return [
	    	'time.required' => "Nhập thông tin không hợp lệ",
		    'numberGasoline.required' => "Nhập thông tin không hợp lệ",
		    'numberOil.required' => "Nhập thông tin không hợp lệ",
	    ];
    }
}
