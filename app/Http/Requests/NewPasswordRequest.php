<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
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
        	'id' => 'required',
        	'old_password' => 'required|min:6|max:20',
	        'password' => 'required|min:6|max:20',
	        'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages() {
	    return [
	    	'old_password.required' => "Không được để trống!",
		    'password.required' => "Không được để trống!",
		    'password_confirmation.required' => "Không được để trống!",
		    'password_confirmation.same' => 'Mật khẩu nhập lại không trùng!'
	    ];
    }
}
