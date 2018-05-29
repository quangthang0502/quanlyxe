<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
			'username' => 'required|min:3|max:20',
			'password' => 'required|min:6'
		];
	}

	public function messages() {
		return [
			'username.required'=> 'Tài khoản không hợp lệ',
			'username.unique'=> 'Tài khoản không hợp lệ hoặc đã tồn tại',
			'username.max'=> 'Địa chỉ Email không hợp lệ hoặc đã tồn tại',
			'password.required' => 'Mật khẩu ít nhất 6 ký tự',
			'password.min' => 'Mật khẩu ít nhất 6 ký tự'
		];
	}
}
