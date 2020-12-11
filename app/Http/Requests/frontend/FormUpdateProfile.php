<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateProfile extends FormRequest
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
            'fullname'=>'required|max:254',
            'phone'=>'required|regex:/(0)[0-9]{9}/',
            'address'=>'required|max:254'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'=>'Tên không được trống',
            'fullname.max'=>'Tên quá dài',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại sai định dạng',
            'address.required'=>'Địa chỉ không được bỏ trống',
            'address.max'=>'Địa chỉ quá dài'
        ];
    }
}
