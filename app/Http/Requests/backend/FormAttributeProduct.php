<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class FormAttributeProduct extends FormRequest
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
            'qty'=>'required',
            'color'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'qty.required'=>'Số lượng không được để trống',
            'color.required'=>'Màu sắc không được để trống',
            'image.required'=>'Ảnh sản phẩm không được để trống',
            'image.image'=>'Ảnh không đúng định dạng',
            'image.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
            'image.max'=>'Kích thước ảnh quá lớn',
        ];
    }
}
