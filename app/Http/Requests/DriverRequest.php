<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
	        'codeDriver' => 'required',
	        'firstName' => 'required',
	        'lastName' => 'required',
	        'address' => 'required',
	        'phoneNumber' => 'required',
	        'cardNumber' => 'required',
	        'birthday' => 'required',
	        'danToc' => 'required',
	        'relationship' => 'required',
	        'religion' => 'required',
	        'educationalLevel' => 'required',
	        'email' => 'required|email',
	        'gender' => 'required',
	        'story' => 'required',
	        'description' => 'required',
        ];
    }

    public function messages() {
	    return [
		    'codeDriver.required' => 'Nhập thông tin không hợp lệ',
		    'firstName.required' => 'Nhập thông tin không hợp lệ',
		    'lastName.required' => 'Nhập thông tin không hợp lệ',
		    'address.required' => 'Nhập thông tin không hợp lệ',
		    'phoneNumber.required' => 'Nhập thông tin không hợp lệ',
		    'cardNumber.required' => 'Nhập thông tin không hợp lệ',
		    'birthday.required' => 'Nhập thông tin không hợp lệ',
		    'danToc.required' => 'Nhập thông tin không hợp lệ',
		    'relationship.required' => 'Nhập thông tin không hợp lệ',
		    'religion.required' => 'Nhập thông tin không hợp lệ',
		    'educationalLevel.required' => 'Nhập thông tin không hợp lệ',
		    'email.required' => 'Nhập thông tin không hợp lệ',
		    'gender.required' => 'Nhập thông tin không hợp lệ',
		    'story.required' => 'Nhập thông tin không hợp lệ',
		    'description.required' => 'Nhập thông tin không hợp lệ',
	    ];
    }
}
