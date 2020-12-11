<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckPassword;
class FormUpdatePassword extends FormRequest
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
            'old_password'=>['required',new CheckPassword],
            'new_password'=>'required|max:254|min:6',
            'confirm_password'=>'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required'=>'Vui lòng nhập mật khẩu',
            'new_password.required'=>'Vui lòng nhập mật khẩu mới',
            'new_password.min'=>'Mật khẩu ít hơn 6 kí tự',
            'new_password.max'=>'Mật khẩu quá dài',
            'confirm_password.required'=>'Vui lòng nhập lại mật khẩu mới',
            'confirm_password.same'=>'Mật khẩu không trùng khớp'
        ];
    }
}
