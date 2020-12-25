<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class FormCreateOrder extends FormRequest
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
            'name'=>'required|regex:[^[a-zA-Z]]|max:254',
            'email'=>'required|max:254|email',
            'address'=>'required|max:254',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/',
            'province'=>'numeric',
            'district'=>'required',
            'ward'=>'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên đầy đủ',
            'name.regex'=>'Họ tên có kí tự đặc biệt',
            'name.max'=>'Họ tên quá dài',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.max'=>'Email quá dài',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại sai định dạng',
            'phone.numeric'=>'Số điện thoại phải là số',
            'address.required'=>'Địa chỉ không được bỏ trống',
            'address.max'=>'Địa chỉ quá dài',
            'province.numeric'=>'Chọn tỉnh/tp',
            'district.required'=>'Chọn quận/huyện',
            'ward.numeric'=>'Chọn phường/xã'
        ];
    }
}
