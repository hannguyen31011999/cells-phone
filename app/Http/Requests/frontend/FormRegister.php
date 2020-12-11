<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class FormRegister extends FormRequest
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
            'fullname'=>'required|regex:[^[a-zA-Z]]|max:254',
            'email'=>'required|email|unique:user,email|max:254',
            'address'=>'required|max:254',
            'password'=>'required|min:6|max:254',
            'confirm_password'=>'required|min:6|max:254|same:password',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập tên đầy đủ',
            'fullname.regex'=>'Họ tên có kí tự đặc biệt',
            'fullname.max'=>'Họ tên quá dài',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email tồn tại',
            'email.max'=>'Email quá dài',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít hơn 6 kí tự',
            'password.max'=>'Mật khẩu quá dài',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại sai định dạng',
            'phone.numeric'=>'Số điện thoại phải là số',
            'address.required'=>'Địa chỉ không được bỏ trống',
            'address.max'=>'Địa chỉ quá dài',
            'confirm_password.required'=>'Mật khẩu không được bỏ trống',
            'confirm_password.min'=>'Mật khẩu ít hơn 6 kí tự',
            'confirm_password.max'=>'Mật khẩu quá dài',
            'confirm_password.same'=>'Mật khẩu không trùng khớp'
        ];
    }
}
