<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class FormCategories extends FormRequest
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
            'categories_name'=>'required|max:254|unique:categories,categories_name',
            'categories_desc'=>'required|max:254',
            'categories_img'=>'image|mimes:jpeg,png,jpg,gif|max:2048|unique:categories,categories_image'
        ];
    }

    public function messages()
    {
        return [
            'categories_name.required'=>'Tên categories không được để trống',
            'categories_name.max'=>'Tên loại sản phẩm quá dài',
            'categories_name.unique'=>'Tên đã tồn tại',
            'categories_desc.required'=>'Mô tả không được để trống',
            'categories_desc.max'=>'Mô tả quá dài',
            'categories_img.required'=>'Ảnh sản phẩm không được để trống',
            'categories_img.image'=>'Ảnh không đúng định dạng',
            'categories_img.mimes'=>'Không đúng loại ảnh jpeg,png,jpg,gif,svg',
            'categories_img.max'=>'Kích thước ảnh quá lớn',
            'categories_img.unique'=>'Ảnh đã tồn tại'
        ];
    }
}
